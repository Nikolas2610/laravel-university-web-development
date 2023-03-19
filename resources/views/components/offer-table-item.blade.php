@props(['index', 'name', 'address', 'href' => null, 'fuel', 'amount'])

<tr>
    <th scope="row" class="border text-center">{{ $index }}</th>
    <td class="border text-center">{{$name}}</td>
    <td class="border text-center"><a href="https://www.google.com/maps?q={{$address}}" target="_blank">{{$address}}</a></td>
    <td class="border text-center">{{$fuel}}</td>
    <td class="border text-center">{{$amount}}</td>
</tr>
