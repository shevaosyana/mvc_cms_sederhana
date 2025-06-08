<?php require APPROOT . '/views/inc/header.php'; ?>
    <div class="row mb-3">
        <div class="col-md-6">
            <h1>Posts</h1>
        </div>
        <div class="col-md-6">
            <a href="<?php echo URLROOT; ?>/posts/add" class="btn btn-primary pull-right">
                <i class="fa fa-pencil"></i> Add Post
            </a>
        </div>
    </div>
    <?php flash('post_message'); ?>
    
    <?php if(empty($data['posts'])): ?>
        <div class="alert alert-info">
            No posts found. <a href="<?php echo URLROOT; ?>/posts/add">Add your first post</a>
        </div>
    <?php else: ?>
        <?php foreach($data['posts'] as $post) : ?>
            <div class="card card-body mb-3">
                <h4 class="card-title"><?php echo $post->title; ?></h4>
                <div class="bg-light p-2 mb-3">
                    Written by <?php echo $post->author_name; ?> on <?php echo $post->created_at; ?>
                </div>
                <p class="card-text"><?php echo substr($post->content, 0, 200) . '...'; ?></p>
                <a href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->id; ?>" class="btn btn-dark">Read More</a>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?> 