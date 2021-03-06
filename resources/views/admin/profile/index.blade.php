@extends(layouts.admin)
@section('title', 'プロフィール')

@section('content')
<div class="container">
    <div class="row">
        <h2>プロフィール画面</h2>
    </div>
    <div class="row">
        <div class="col-md-4">
            <a href="{{action('Admin\ProfileController@add')}}"role="botton" class"btn btn-primary">新規作成</a>
            
            </div>
            <div class="col-md-8">
            <form action="{{action('Admin\ProfileController@index')}}" method="get">
                <div class="form-group row">
                    <label class="col-md-2">タイトル</label>
                    <div class="col-md-8">
                        <input type="submit" class = "btn btn-primary" value="検索">
                        
                        
                    </div>
                </div>
                
            </form>
            </div>
    </div>
    <div class="row">
        <div class = "list-profile col-md-12 mx-auto">
            <div class="row">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th width="10%">ID</th>
                            <th widti="20%">氏名</th>
                            <th width="20%">性別</th>
                            <th width="20%">趣味</th>
                            <th width="20%">自己紹介</th>
                        </tr>
                    </thead>
                    　<tbody>
                    　    @foreach($posts as $profile)
                    　    <tr>
                    　   <th>{{ $profile->id }}</th>
                    　   <td>{{ \Str::limit($profile->title, 100)}}</td>
                    　   <td>{{ \Str::limit($profile->body, 250)}}</td>
                    　   <td>
                    　       <div>
                    　           <a href="{{ action('Admin\ProfileController@edit', ['id'=>$profile->id]) }}">編集</a>
                    　             </div>
                    　            
                    　   </td>
                    　    </tr>
                    　    @endforeach
                    　</tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection