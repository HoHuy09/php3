

<table>
    <thead>
        <th>STT</th>
        <th>Plate_number</th>
        <th>Owner</th>
        <th>Travel_fee</th>
        <th>
            <a href="{{route('car.add')}}">Add new</a>
        </th>
    </thead>
    <tbody>
        @foreach ($car as $item) 
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->plate_number}}</td>
                <td>{{$item->owner}}</td>
                <td>{{$item->travel_fee}}</td>
                
                <td>
                    <a href="{{route('car.edit', ['id' => $item->id])}}">Edit</a>
                    <a href="{{route('car.remove', ['id' => $item->id])}}">Remove</a>
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