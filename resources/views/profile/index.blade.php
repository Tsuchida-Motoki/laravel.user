@extends('layouts.front')

@section('content')
    <div class="container">
        
        <hr color="#c0c0c0">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
               
                    <div class="post">
                        <div class="row">
                            <div class="text col-md-10">
                                
                        <table class="table table-dark">
                          <thead>
                          <tr>
                            <th width="10%">ID</th>
                            <th width="20%">氏名</th>
                            <th width="20%">性別</th>
                            <th width="20%">趣味</th>
                            <th width="20%">自己紹介</th>
                        </tr>
                          </thead>
                    　     <tbody>
                    　    @foreach($posts as $profile)
                    　    <tr>
                    　   
                    　   <td>{{ \Str::limit($profile->id, 20)}}</td>
                    　   <td>{{ \Str::limit($profile->name, 30)}}</td>
                    　   <td>{{ \Str::limit($profile->gender, 30)}}</td>
                    　   <td>{{ \Str::limit($profile->hobby, 30)}}</td>
                    　   <td>{{ \Str::limit($profile->introduction, 60)}}</td>
                     </tr>
                    　    @endforeach
                    　</tbody>
                </table>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                
            </div>
        </div>
    </div>
  </div>
@endsection