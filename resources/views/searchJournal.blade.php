@extends('layout')
@section('content')
<style>
    
    body{
    background-image: url('');
    background-attachment: fixed;
    background-size: cover;
}
.title{
    background-color: maroon;
    color: white;
    margin-top: 3px;
    padding-top: 20px;
    padding-bottom: 20px;
    font-family: 'Times New Roman', serif;
}
.card-body{
    text-align: center;
}
.addButton{
  float:right;
  text-align: right;
}
.grid-container {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  grid-auto-rows: minmax(250px, auto);
  gap: 30px;
  padding: 5px;
  width: 100%;
}
.grid-container > div {
  background-color: #E8E8E8;
  text-align: center;
  padding: 1px;
  height: 300px;
  border: 1px solid black;
}
.journalName{
  font-weight: bold;
  font-size: 30px;
}
.author{
  font-style: italic;
}
.date{
  font-style: italic;
}
a{
  text-decoration: none;
  color: black;
}
</style>
<body>
<hr>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand"  href="{{ url('/') }}" >LINUS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('wildlife') }}">WILDLIFE<span class="sr-only"></span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('thesis') }}">THESIS PAPER<span class="sr-only"></span></a>
      </li> 
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('journal') }}">JOURNAL ARTICLE<span class="sr-only"></span></a>
      </li>
    </ul>
  </div>
</nav>
<hr>
<div class="table-responsive">
                        <table class="table">
                             <thead>
                                 <tr>
                            <form style="text-align: center;"class="form-inline my-2 my-lg=0" type="get" action="{{ route('searchJournal') }}">
                            <td></td>
                            <td></td>
                            <td><input type="search" name="searchJournal" class="form-control mr-sm2" placeholder="Search Journal Article Title"></td>
                                <td><button class="btn btn-primary btn-sm" type="submit">Search</button></td>
                        </form>
                         </tr>
                        </thead>
                    </table>
                    </div>
            <div class="grid-container">
                                @foreach($journal as $item)
                                    <div class="content">
                                    <a  href="{{ route('showJournal',$item->info_ID) }}">
                                        <span class="date">
                                            {{$item->date_published }} <br>
                                        </span>
                                        <span class="journalName">
                                            {{$item->journal_title}}<br>
                                        </span>
                                        <span class="author">
                                          ({{$item->journal_author}})
                                        </span>
                                    </a>
                                    </div><!--end of grid data-->
                                @endforeach
                            <br/>
            </div><!--end of grid-->
<br>
<div class="addButton">
    <form method="post" action="{{ route('storeDataJournal') }}" enctype="multipart/form-data">
      {!! csrf_field() !!}
      <div class="form-group">
      <input type="hidden" class="form-control"   name="info_type" value="journal article">
    </div>
   {{ csrf_field() }}
    <button type="submit"  class="btn btn-success">+</button>
  </form>
<hr>
</div>
</body>
@endsection