<ul>
    @foreach($customers as $customer)
        <li>{{$customer->active}} - {{$customer->name}} </li>
    @endforeach
</ul>
{{ $customers->appends(request()->input())->links() }}
