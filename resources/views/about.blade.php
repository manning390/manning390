@extends('layout.app')

@section('content')
    <article  class="container">
        <div class="row">
            <div class="col-12 col-md-10">
                <section class="hero">
                    <div class="jumbotron">
                        <h3>
                            Hey, I'm an aspiring game developer.<br >
                            I have leveled up other skills though.
                        </h3>
                        <p class="lead mt-2">
                            I design, build &amp; play video games.<br />
                            I also tinker with full-stack web applications.<br />
                            Want to collaborate?<br />
                            I'm game <a class="link-u accent" href="mailto:{{ config('blog.email') }}" title="Email Me">{{ config('blog.email') }}</a>
                        </p>
                    </div>
                    <a class="hero-arrow" href="#passions">
                        @svg('chevron-bottom', 'accent')
                    </a>
                </section>
            </div>
        </div>
        <section id="passions">
            <div class="row mb-20 mb-sm-40">
                <div class="col-12">
                    <header class="section-header">
                        <h2 class="section-header-title">Passions</h2>
                    </header>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6">
                    <p class="extra-large">
                        I love the art form of games.<br />
                        Here are a few things I am passionate about.
                    </p>
                </div>
                <div id="passion-list" class="col-12 col-md-6">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-12 mb-20 mb-md-40">
                            <h4>Community</h4>
                            <p>In all games lies a community of players. Be it through live letters or balance changes, involving and listening to them is paramount.</p>
                        </div>
                        <div class="col-12 col-sm-6 col-md-12 mb-20 mb-md-40">
                            <h4>Story</h4>
                            <p>Any game can be fun, but only those with good story and direction make you feel. Finishing a good game should elicit a feeling of catharsis.</p>
                        </div>
                        <div class="col-12 col-sm-6 col-md-12 mb-20 mb-md-40">
                            <h4>Accessibility</h4>
                            <p>Anyone should be able to play your game. In this regard, cross-platform, cross-play, and fully rebindable controls are critical.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
{{--     <section id="featured-project">
        <div class="row">
            <div class="col-12">
                <header class="section-header">
                    <h2 class="section-header-title">Featured Project</h2>
                </header>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a href="" title="">
                    <img id="featured-project-image" class="img-fluid" src="//placehold.it/500x300" alt="placeholder"/>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                Something or other
            </div>
        </div>--}}
        <section id="hireme">
            <div class="row">
                <div class="col-12 mb-20 mb-sm-40">
                    <header class="section-header">
                        <h2 class="section-header-title">Hire Me</h2>
                    </header>
                </div>
            </div>
            <div class="row mb-80 mb-sm-60 mb-md-120">
                <div class="col-12">
                    <p class="large">Looking for a driven, energetic, and creative software engineer with full-stack web development and game programming skills for your next project?</p>
                    <p class="large">I am extensively experienced in <a class="accent" href="https://laravel.com/" title="Laravel">Laravel</a> and working with front-end frameworks such as <a class="accent" href="https://getbootstrap.com/" title="Bootstrap">Bootstrap</a>, <a class="accent" href="https://vuejs.org/" title="Vue.js">Vue.js</a>, and <a class="accent" href="https://reactjs.org/" title="React">React</a> granting me the skills to produce an application from <strong>concept to completion</strong>. I am also familiar with engines such as <a class="accent" href="https://unity3d.com/" title="Unity">Unity</a>, and <a class="accent" href="https://godotengine.org/" title="Godot">Godot</a> and libraries such as OpenGl and <a class="accent" href="https://www.sfml-dev.org/" title="SFML">SFML</a> though I revel in the opportunity to learn new languages and frameworks.</p>
                    <p class="large">
                        <a class="link-u accent" href="mailto:{{ config('blog.email') }}" title="Email Me">{{ config('blog.email') }}</a>
                    </p>
                </div>
            </div>
        </section>
    </article>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            setInterval(function(){
                $('.hero-arrow .icon').animateCss('bounce');
            }, 7000);
            setInterval(function(){
                $('.accent-picker').animateCss('swing');
            }, 10000);
        });
    </script>
@endpush