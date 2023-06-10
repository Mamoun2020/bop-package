<?php

namespace Mamoun2020\Bop\Http\Controllers;

use App\Models\Report;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Mamoun2020\Bop\Models\Order;
use App\Http\Controllers\Controller;

class BopController extends Controller
{

    public function pay(Request $request)
    {
        $merchantID = config('bop.merchant_id');
        $password = config('bop.password');
        $acquirerID = config('bop.acquirer_id');
        $version = '1.0.0';
        $url = config('bop.url');

        $currency = 376; // ILS
        $currencyExp = 2;
        $captureFlag = 'M';
        $signatureMethod = 'SHA1';

        $order = Order::query()->findOrFail($request->query('order_id'));

        $purchaseAmt = number_format($order->price, 2);
        $orderID = 'order'.$order->id.'_'.Str::random(10);

        $purchaseAmt = str_pad($purchaseAmt, 13, '0', STR_PAD_LEFT);
        $formattedPurchaseAmt = substr($purchaseAmt, 0, 10).substr($purchaseAmt, 11);


        $toEncrypt = $password.$merchantID.$acquirerID.$orderID.$formattedPurchaseAmt.$currency;
        $sha1Signature = sha1($toEncrypt);
        $base64Sha1Signature = base64_encode(pack('H*', $sha1Signature));

        return Response()->json([
            'url'                  => $url,
            'version'              => $version,
            'merchantID'           => $merchantID,
            'acquirerID'           => $acquirerID,
            'responseURL'          => route('bop.callback'),
            'formattedPurchaseAmt' => $formattedPurchaseAmt,
            'currency'             => $currency,
            'currencyExp'          => $currencyExp,
            'orderID'              => $orderID,
            'captureFlag'          => $captureFlag,
            'base64Sha1Signature'  => $base64Sha1Signature,
            'signatureMethod'      => $signatureMethod,
        ]);
    }

    public function callback(Request $request)
    {
        $success_redirect = config('bop.success_url');
        $failed_redirect = config('bop.fail_url');

        $order_id = Str::of($request->OrderID)
            ->trim()
            ->afterLast('order')
            ->before('_')
            ->value();

        Order::query()->where('id', $order_id)->update([
            'status'           => ($request->ResponseCode == 1 && $request->ReasonCode == 1) ? 'paid' : 'unpaid',
            'payment_response' => json_encode(request()->toArray()),
        ]);


        if ($request->ResponseCode == 1 && $request->ReasonCode == 1) {
            return redirect()->away("$success_redirect");
        } else {
            return redirect()->away("$failed_redirect");
        }
    }
}
