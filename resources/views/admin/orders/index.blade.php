@extends('admin.layout')

@section('content')

    <div class="d-flex my-4">
        <h1 class="mx-2">Orders</h1>
    </div>

    <br>

    <table class="table">
        <tr>
            <th>Order Id</th>
            <th>Customer Id</th>
            <th>Customer Email</th>
            <th>Total Amount</th>
            <th>Order Time</th>
            <td>Order Status</td>
            <th>Actions</th>
        </tr>
        @foreach ($orders as $order)
            <tr class=" {{$order->order_status == 'sent' ? 'order-sent' : ''}}
                        {{$order->order_status == 'delivered' ? 'order-delivered' : ''}}  
                        {{$order->order_status == 'processing' ? 'order-processing' : ''}}
                ">
                <td> {{$order->id}} </td>
                <td> {{$order->user_id}} </td>
                <td> {{$order->billing_email}} </td>
                <td>{{presentPrice($order->billing_total)}}</td>
                <td>{{$order->created_at}}</td>
                <td>
                    <form action="{{route('orders.update', $order->id)}})" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group d-flex">
                            <select name="newStatus" class="form-control">
                                <option {{ $order->order_status == 'processing' ? 'selected' : '' }} value="processing">Processing</option>
                                <option {{ $order->order_status == 'sent' ? 'selected' : '' }} value="sent">Sent</option>
                                <option {{ $order->order_status == 'delivered' ? 'selected' : '' }} value="delivered">Delivered</option>
                            </select>
                            <button type="submit" class="admin-button-simple">Change</button>
                        </div>
                    </form>
                </td>
                <td>
                    
                    <a class="text-primary" href="{{route('orders.show', $order->id)}}" class="d-block"><i class="fa fa-eye" aria-hidden="true"></i>View</a>                              
                    
                    <form action="{{route('orders.destroy', $order->id)}}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button style="font-size:1rem !important" class="button-simple text-danger"><i class="fa fa-times" aria-hidden="true"></i>Del</button>
                    </form>
                </td>

            </tr>
        @endforeach
    </table>
@endsection