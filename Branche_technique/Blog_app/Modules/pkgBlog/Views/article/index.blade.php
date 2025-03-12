@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>{{ __('article.header') }}</h1>



        <div class="card">
            <div class="card-header d-flex pb-0 pt-3">
                <!-- Champ de recherche -->
                <form method="GET" action="{{ route('articles.index') }}" class="d-flex mb-3">
                    <div class="form-group">
                        <input type="text" name="search" id="search" class="form-control" 
                               value="{{ request('search') }}" 
                               placeholder="{{ __('article.search') }}">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary mx-3">{{ __('article.search') }}</button>
                    </div>
                </form>

                <!-- Filtres par catégorie et tag -->
                <form method="GET" action="{{ route('articles.index') }}" class="d-flex mb-3 mx-3">
                    <div class="form-group mx-2">
                        <select name="category" id="category" class="form-control">
                            <option value="">{{ __('article.all_categories') }}</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" 
                                    {{ request('category') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mx-2">
                        <select name="tag" id="tag" class="form-control">
                            <option value="">{{ __('article.all_tags') }}</option>
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}" 
                                    {{ request('tag') == $tag->id ? 'selected' : '' }}>
                                    {{ $tag->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mx-3">{{ __('article.filtre') }}</button>
                </form>
            </div>

            <div class="d-flex justify-content-between mx-3 mt-3">
                <h3 class="card-title my-0">{{ __('article.list_of_articles') }}</h3>
                <a href="{{ route('articles.create') }}" class="btn btn-success">{{ __('article.add_article') }}</a>  
            </div>

            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">{{ __('article.success_message') }}</div>
                @endif
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>{{ __('article.title') }}</th>
                            <th>{{ __('article.category') }}</th>
                            <th>{{ __('article.created_at') }}</th>
                            <th>{{ __('article.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($articles as $article)
                            @if(
                                (empty(request('category')) || $article->category->id == request('category')) &&
                                ($article->tags->pluck('id')->contains(request('tag')) || !request('tag')) &&
                                (strpos($article->title, request('search')) !== false || 
                                 strpos($article->content, request('search')) !== false || 
                                 !request('search'))
                            )
                                <tr>
                                    <td>{{ $article->id }}</td>
                                    <td>{{ $article->title }}</td>
                                    <td>{{ $article->category->name }}</td>
                                    <td>{{ $article->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        <a href="{{ route('articles.show', $article->id) }}" class="btn btn-secondary">
                                            {{ __('article.show') }}
                                        </a>
                                        @can('update', $article)
                                        <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-primary">
                                            {{ __('article.edit') }}
                                        </a>
                                        @endcan
                                        @can('delete', $article)
                                            <form action="{{ route('articles.destroy', $article->id) }}" method="POST" 
                                                style="display:inline;" 
                                                onsubmit="return confirm('{{ __('article.delete_confirm') }}');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    {{ __('article.delete') }}
                                                </button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
                
                <!-- Pagination -->
                <div class="d-flex justify-content-center mt-3">
                    {{ $articles->links() }}
                </div>
            </div>
        </div>
    </div>
@stop
