
@extends('layouts.app')

    @section('content')
    <div class="container-fluid">
        <div class="row" style="height: 100vh;">
            <div class="col-md-auto flex-grow-1 p-3 bg-body-tertiary">
                    <a class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                        <span class="fs-4">Admin Panel</span>
                    </a>
                    <hr>
                    <ul class="nav nav-pills flex-column mb-auto">
                        <li class="nav-item">
                            <a href="{{route('graphWeights.index')}}" class="nav-link link-body-emphasis" aria-current="page">
                                Graph Weights
                            </a>
                        </li>
                        <li>
                            <a href="{{route('users.index')}}" class="nav-link link-body-emphasis">
                                Users
                            </a>
                        </li>
                        <li>
                            <a href="{{route('likes.index')}}" class="nav-link link-body-emphasis">
                                Likes
                            </a>
                        </li>
                        <li>
                            <a href="{{route('libraries.index')}}" class="nav-link link-body-emphasis">
                                Libraraies
                            </a>
                        </li>
                        <li>
                            <a href="{{route('comments.index')}}" class="nav-link link-body-emphasis">
                                Comments
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link link-body-emphasis">
                                Games
                            </a>
                        </li>
                    </ul>
            </div>

            <div class="col-md-10">
                @yield('table')
            </div>
        </div>
    </div>
    @endsection
