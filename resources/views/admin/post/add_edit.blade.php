@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('admin.menu')
        </div>
        <div class="col-md-9 container">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            @if(isset($post))
                                Редактировать пост
                            @else
                                Добавить новый пост
                            @endif
                        </div>
                        <div class="panel-body">
                            <form method="post" action="" class="form-horizontal">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" @if(isset($post))value="{{$post->id}}"@endif>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="name">Имя поста</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="name" id="name" type="text" @if(isset($post))value="{{$post->name}}"@endif>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="url">URL поста</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="url" id="url" type="text" @if(isset($post))value="{{$post->url}}"@endif>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="description">Описание</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="description" id="description">@if(isset($post)){{$post->description}}@endif</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="public">Публикация</label>
                                    <div class="col-sm-1">
                                        @if(isset($post))
                                            @if($post->publication == 'yes')
                                                <input  name="public"  type="radio" value="Yes" checked>
                                                <label>Yes</label>
                                                <input  name="public" type="radio" value="No">
                                                <label>No</label>
                                            @else
                                                <input  name="public"  type="radio" value="Yes">
                                                <label>Yes</label>
                                                <input  name="public" type="radio" value="No" checked>
                                                <label>No</label>
                                            @endif
                                        @else
                                            <input  name="public"  type="radio" value="Yes">
                                            <label>Yes</label>
                                            <input  name="public" type="radio" value="No">
                                            <label>No</label>
                                        @endif

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="id_category">Выберите категорию</label>
                                    <div class="col-sm-9">
                                        @if(isset($post))
                                            @if(count($categories))
                                                <select name="id_category" id="id_category" class="form-control">
                                                    @foreach($categories as $cat)
                                                        <option value="{{$cat->id}}"
                                                                @if($cat->id == $post->id_category)
                                                                selected="selected"
                                                                @endif
                                                                >{{$cat->name}}</option>
                                                    @endforeach
                                                </select>
                                            @endif
                                        @else
                                            @if(count($categories))
                                                <select name="id_category" id="id_category" class="form-control">
                                                    @foreach($categories as $cat)
                                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                                    @endforeach
                                                </select>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="tags">Выберите теги</label>
                                    <div class="col-sm-9">
                                        @if(isset($post))
                                            <textarea class="form-control hidden" name="tags" id="tags">{{$post->tags}}</textarea>
                                            @if(count($tags))
                                                @foreach($tags as $tag)
                                                    @if(in_array($tag->name,explode(',', $post->tags)) !== false)
                                                        <button type="button" class="btn-md btn-success tag_button selected" data-name="{{$tag->name}}">{{$tag->name}}</button>
                                                    @else
                                                        <button type="button" class="btn-md btn-info tag_button" data-name="{{$tag->name}}">{{$tag->name}}</button>
                                                    @endif

                                                @endforeach
                                            @endif
                                        @else
                                            <textarea class="form-control hidden" name="tags" id="tags"></textarea>
                                            @if(count($tags))
                                                @foreach($tags as $tag)
                                                    <button type="button" class="btn-md btn-info tag_button" data-name="{{$tag->name}}">{{$tag->name}}</button>
                                                @endforeach
                                            @endif
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="post_preview">Анонс поста</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="post_preview" id="post_preview">@if(isset($post)){{$post->post_preview}}@endif</textarea>
                                    </div>
                                </div>
                                <div class="form-group submit_button">
                                    <input type="submit" name="submit" value="Сохранить" class="btn btn-primary pull-right">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            Array.prototype.remove = function(value) {
                var idx = this.indexOf(value);
                if (idx != -1) {
                    return this.splice(idx, 1);
                }
                return false;
            }
            $('.tag_button').click(function(){
                if($(this).hasClass('selected')){
                    $(this).removeClass('btn-success');
                    $(this).removeClass('selected');
                    $(this).addClass('btn-info');
                }else{
                    $(this).addClass('btn-success');
                    $(this).addClass('selected');
                    $(this).removeClass('btn-info');
                }
                var array_tags = [];
                $('.tag_button.selected').each(function(){
                    array_tags.push($(this).attr('data-name'));
                });
                console.log(array_tags);
                $('#tags').val(array_tags.join(','));
            });
        });
    </script>
@endsection
