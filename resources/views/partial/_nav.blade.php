<div id="header" class="header-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <header class="header">
                    <div class="header-logo" href="/">
                        <a href="{{ route('about') }}" class="header-title accent"> Michael Manning </a>
                        <p class="header-subtitle"> Game Developer </p>
                    </div>
                    <nav class="header-nav">
                        <div class="nav">
                            <a class="nav-link link accent d-none d-sm-inline {{ active('about') }}" href="{{ route('about') }}">About</a>
                            {{-- <a class="nav-link link accent {{ active('project') }}" href="{{ route('project.index') }}">Projects</a> --}}
                            {{-- <a class="nav-link link accent {{ active('blog') }}" href="{{ route('blog.index') }}">Blog</a> --}}
                            <a class="nav-link accent text-muted d-none d-sm-inline" href="mailto:{{ config('blog.email') }}" title="Email Me">{{ config('blog.email') }}</a>
                            <div class="nav-link accent-dropdown dropdown">
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
                        </div>
                    </nav>
                </header>
            </div>
        </div>
    </div>
</div>