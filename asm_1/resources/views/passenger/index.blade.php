<table>
    <thead>
        <th>STT</th>
        <th>Name</th>
        <th>Car_id</th>
        <th>Travel_time</th>
        <th>
            <a href="{{route('passenger.add')}}">Add new</a>
        </th>
    </thead>
    <tbody>
        @foreach ($passenger as $item) 
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->car_id}}</td>
                <td>{{$item->travel_time}}</td>
                
                <td>
                    <a href="{{route('passenger.edit', ['id' => $item->id])}}">Edit</a>
                    <a href="{{route('passenger.remove', ['id' => $item->id])}}">Remove</a>
                </td>
            </tr>
        @endforeach 
        <tr>
            <td colspan="5">
                {{-- {{$car->onEachSide(1)->links()}} --}}
            </td>
        </tr>
    </tbody>
</table>