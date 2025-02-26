<x-content-organi>

    <div>
        <table border="1">
            @foreach($sheetData as $row)
                <tr>
                    @foreach($row as $cell)
                        <td>{{ $cell }}</td>
                    @endforeach
                </tr>
            @endforeach
        </table>
    </div>
</x-content-organi>