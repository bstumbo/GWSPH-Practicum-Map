  @foreach($siteprac as $entry)
     <div id="{{$entry['site']->id}}" class="site-row" style="clear:both; border: 1px solid black; margin: 20px;">
       <div class="org_name site-div" style="width: 25%; float: left;"><p align=center>{{$entry['site']->org_name}}</p></div>
       <div class="city site-div" style="width: 25%; float: left;"><p align=center>{{$entry['site']->city}}</p></div>
       <div class="state site-div" style="width: 25%; float: left;"><p align=center>{{$entry['site']->state}}</p></div>
       <div class="country site-div" style="width: 25%; float: left;"><p align=center>{{$entry['site']->country}}</p></div>
       <div style="width:100%; display:none;" class="sub-row" id="{{$entry['site']->id}}">
         <table style="width: 100%; border: 1px solid black;">
            <th style="width: 25%; text-align: center;"><strong>Practicum Plan Titles</strong></th>
            <th style="width: 25%; text-align: center;"><strong>Work Terms</strong></th>
            <th style="width: 25%; text-align: center;"><strong>Major</strong></th>
            <th style="width: 25%; text-align: center;"><strong>Departments/Tracks</strong></th>
           @foreach($entry['practicums'] as $prac)
             <tr id="{{$prac->prac_id}}">
               <td style="width: 25%; text-align: center;">{{$prac->title}}</td>
               <td style="width: 25%; text-align: center;">{{$prac->term}}</td>
               <td style="width: 25%; text-align: center;"><a target="_blank" href="{{$prac->program_link}}">{{$prac->major}}</a></td>
               <td style="width: 25%; text-align: center;">{{$prac->department}}</td>
             </tr>
           @endforeach 
         </table>
       </div>
     </div> 
    @endforeach