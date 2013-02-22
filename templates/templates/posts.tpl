<h1>{$name}</h1>
<div class="content">
	<ul class="posts">
		{foreach $posts as $post}
		<li class="onePost">
			<a class="postTitle" href="/post/{$short}/{$post['id']}/{$post['slug']}">
				<span class="date">{$post['date']|date_format:"%b %e, %Y"}</span>{$post['title']}
			</a>
			<div class="description">{$post['desc']}</div>
		</li>
		{foreachelse}
		<li class="noPosts">No posts were found in the category "{$short}". Guess I need to work on gettin' my creative juices flowing!</li>
		{/foreach}
	</ul>
</div>