<!doctype html>
<html lang="{{ app()->getLocale() }}">

@include('partials.head')

<body style="background-image: url('{{$background}}')">
<div class="container api">
    <h1>Today's Overwatch Arcade REST API</h1>
    <p>Please be a nice person and don't abuse or sell or do any other unethical things with this free API.</p>
    <p>Giving credit is always appreciated 😁</p>
    <br />
    <table class="table table-hover table-striped">
        <thead>
        <th>Name</th>
        <th>URL</th>
        <th>Method</th>
        <th>Notes</th>
        </thead>
        <tbody>
            <tr>
                <td>Today's gamemode</td>
                <td>/api/today</td>
                <td>get</td>
                <td>Returns empty json array when there's no today's gamemode set yet</td>
            </tr>
            <tr>
                <td>This week's gamemodes</td>
                <td>/api/week</td>
                <td>get</td>
                <td>-</td>
            </tr>
        </tbody>
    </table>
    <a href="/" class="btn btn-primary">Back</a>
</div>


</body>
<script src="{{ URL::asset('/js/jquery.min.js') }}"></script>
<script src="{{ URL::asset('/js/bootstrap.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"
        integrity="sha256-FSEeC+c0OJh+0FI23EzpCWL3xGRSQnNkRGV2UF5maXs=" crossorigin="anonymous"></script>
</html>
