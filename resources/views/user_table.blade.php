<div class = "col-12">
    <table class = "table table-striped table-bordered table-hover">
        <div class = "card-header" style = "text-align: center;">Dashboard</div>
        <thead class = "thead-dark">
        <tr>
            <th scope = "col" class = "text-center">Name</th>
            <th scope = "col" class = "text-center">Games</th>
            <th scope = "col" class = "text-center">Wins</th>
        </tr>
        </thead>
        <tbody>
        
        @foreach($userData as $userDatum)
            <tr>
                <td class = "text-center">{{ $userDatum->name }}</td>
                <td class = "text-center">{{ $userDatum->games }}</td>
                <td class = "text-center">{{ $userDatum->wins }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
