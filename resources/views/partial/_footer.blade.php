<footer class="footer">
    <div class="container">
        <div class="row mb-40 mb-sm-60">
            <div class="col-8 col-md-6">
                <h3>Michael Manning</h3>
                <p>
                    <a class="accent" href="mailto:{{ config('blog.email') }}">{{ config('blog.email') }}</a>
                </p>
                <p>
                    I'm an aspiring game developer.<br />
                    I have leveled up other skill trees though.
                </p>
            </div>
        </div>
        <div class="row mb-40 mb-sm-80">
            <div class="col-12 col-sm-6 col-md-2 mb-40">
                <h4 class="mb-20 mb-sm-40">Menu</h4>
                <dd><a class="accent" href="{{ route('about') }}">About</a></dd>
                {{-- <dd><a class="accent" href="{{ route('project.index') }}">Projects</a></dd> --}}
                {{-- <dd><a class="accent" href="{{ route('blog.index') }}">Blog</a></dd> --}}
            </div>
            <div class="col-12 col-sm-6 col-md-3 mb-40">
                <h4 class="mb-20 mb-sm-40">Contact</h4>
                <dd><a class="accent" href="mailto:{{ config('blog.email') }}">{{ config('blog.email') }}</a></dd>
                <dd><a class="accent" href="{{ config('blog.social.twitter.href') }}">{{ config('blog.social.twitter.name') }}</a></dd>
            </div>
            <div class="col-12 col-md-4 col-md-offset-3 mb-40">
                <h4 class="mb-20 mb-sm-40">Social</h4>
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <dd><a class="accent" href="{{ config('blog.social.github.href') }}">Github</a></dd>
                        <dd><a class="accent" href="{{ config('blog.social.linkedin.href') }}">LinkedIn</a></dd>
                    </div>
                    <div class="col-12 col-sm-6">
                        <dd><a class="accent" href="{{ config('blog.social.twitter.href') }}">Twitter</a></dd>
                        <dd><a class="accent" href="{{ config('blog.social.twitch.href') }}">Twitch</a></dd>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p class="copyright">
                    Copyright Michael Manning {{ date('Y') }} {{-- <a class="accent" href="{{ '/' }}">More information</a> --}} &mdash; made with <a class="accent" href="https://laravel.com">Laravel</a>
                </p>
            </div>
        </div>
    </div>
</footer>