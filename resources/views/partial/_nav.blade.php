<div id="header" class="header-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <header class="header">
                    <div class="header-logo" href="/">
                        <a href="#" class="header-title accent"> Michael Manning </a>
                        <p class="header-subtitle"> Game Developer </p>
                    </div>
                    <nav class="header-nav">
                        <ul class="nav-list">
                            <li class="nav-item">
                                <a class="nav-link link accent {{ active('about') }}" href="{{ route('about') }}">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link link accent {{ active('project') }}" href="{{ route('project.index') }}">Projects</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link link accent {{ active('blog') }}" href="{{ route('blog.index') }}">Blog</a>
                            </li>
                            <li class="nav-item hide-xs show-sm">
                                <a class="nav-link accent text-muted" href="mailto:{{ config('blog.email') }}" title="Email Me">{{ config('blog.email') }}</a>
                            </li>
                            <li class="nav-item d-flex flex-column">
                                <div class="accent-dropdown dropdown">
                                    <button class="accent-picker" data-toggle="dropdown"></button>
                                    <div class="dropdown-menu">
                                        <div class="dropdown-item">
                                            <button class="accent-select accent-orange" data-accent="accent-orange"></button>
                                        </div>
                                        <div class="dropdown-item">
                                            <button class="accent-select accent-teal" data-accent="accent-teal"></button>
                                        </div>
                                        <div class="dropdown-item">
                                            <button class="accent-select accent-violet" data-accent="accent-violet"></button>
                                        </div>
                                        <div class="dropdown-item">
                                            <button class="accent-select accent-ruby" data-accent="accent-ruby"></button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </header>
            </div>
        </div>
    </div>
</div>