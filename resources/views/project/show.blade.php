<h1>{{ $project->title }}</h1>
<h2>{{ $project->subtitle }}</h2>
<p>{{ $project->description }}</p>
<p>{{ $project->formatted_start }}</p>
<p>{{ $project->formatted_finish }}</p>
<p><a src="{{ $project->href }}">{{ $project->href }}</a></p>
<p><a src="{{ $project->source }}">{{ $project->source }}</a></p>
<p>{{ $project->additional }}</p>