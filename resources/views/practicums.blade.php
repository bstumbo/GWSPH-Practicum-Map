<style>
    ul.pagination li {
    display: inline;
    }
    
    table {
        border: 1px solid black;
        padding: 5px; 
    }
    
    tr {
        margin-top: 5px;
    }
    
    td {
        padding: 5px;
        border: 1px solid black;
    }
</style>

<h1>Practicums</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Term</th>
                <th>Description</th>
                <th>Department</th>
                <th>Site</th>
            </tr>
        </thead>
        <tbody>                    
            @foreach ($practicums as $practicum)
                <tr id="practicum{{$practicum->id}}">
                    <td style="width: 16%; text-align: center;">{{$practicum->title}}</td>
                    <td style="width: 16%; text-align: center;">{{$practicum->term}}</td>
                    <td style="width: 16%; text-align: center;">{{$practicum->description}}</td>
                    <td style="width: 16%; text-align: center;">{{$practicum->department}}</td>
                    <td style="width: 16%; text-align: center;">{{$practicum->site_id}}</td>
                    <td>
                       <button class="btn btn-warning btn-xs btn-detail open-modal" value="{{$practicum->id}}">Edit</button>
                       <button class="btn btn-danger btn-xs btn-delete delete-task" value="{{$practicum->id}}">Delete</button>
                   </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
     <div style="width: 400px; margin-right: auto; margin-left: auto;">{{ $practicums->links() }}</div>
        
<meta name="_token" content="{!! csrf_token() !!}" />  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="{{asset('js/prac-admin.js')}}"></script>
