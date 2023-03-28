@props(['index', 'name', 'address', 'href' => null, 'fuel', 'amount', 'elementId', 'greenId'])

<tr class="@if($elementId === $greenId) bg-success @endif">
    <th scope="row" class="border text-center">{{ $index }}</th>
    <td class="border text-center @if($elementId === $greenId) text-white @endif">{{$name}}</td>
    <td class="border text-center"><a href="https://www.google.com/maps?q={{$address}}" target="_blank" class="a__item @if($elementId === $greenId) text-white @endif">{{$address}}</a></td>
    <td class="border text-center @if($elementId === $greenId) text-white @endif">{{$fuel}}</td>
    <td class="border text-center @if($elementId === $greenId) text-white @endif">{{$amount}}</td>
</tr>
