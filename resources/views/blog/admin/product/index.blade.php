@extends('layouts.app_admin')

@section('content')

    <section class="content-header">
        @component('blog.admin.components.breadcrumb')
            @slot('title') Список товаров @endslot
            @slot('parent') Главная @endslot
            @slot('active') Список товаров @endslot
        @endcomponent
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Категория</th>
                                <th>Наименование</th>
                                <th>Цена</th>
                                <th>Статус</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($getAllProducts as $product)
                                <tr @if ($product->status == 0)  style="color: red"; @endif>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->cat}}</td>
                                    <td>{{$product->title}}</td>
                                    <td>{{$product->price}}</td>
                                    <!-- если статус true или 1 то On если false или 0 то Off -->
                                    <td>{{$product->status ? 'On' : 'Off'}}</td>

                                    <td>
                                        <a href="{{route('blog.admin.products.edit', $product->id)}}" title="Редактировать"><i class="fa fa-fw fa-eye"></i></a>
                                        @if ($product->status == 0)
                                            <a class="delete" href="" title="Перевести status = On"><i class="fa fa-fw fa-refresh"></i></a>

                                            @else
                                            <a class="delete" href="" title="Перевести status = Off"><i class="fa fa-fw fa-close"></i></a>
                                        @endif

                                        @if ($product)
                                            <a class="delete" href="" title="Удалить из БД"><i class="fa fa-fw fa-close text-danger"></i></a>
                                        @endif

                                    </td>
                                </tr>

                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">
                        <p>{{count($getAllProducts)}} продуктов из {{$count}} </p>

                        @if ($getAllProducts->total() > $getAllProducts->count())
                            <br>
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            {{$getAllProducts->links()}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
