// public/js/app.js
const app = angular.module('socialApp', []);

app.config(['$interpolateProvider', function($interpolateProvider) {
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
}]);

app.controller('PostController', ['$scope', '$http', function($scope, $http) {
    $scope.posts = [];
    $scope.newPost = { content: '' };
    $scope.currentUser = window.Laravel.user;

    // Add CSRF token to all requests
    $http.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    // Fetch all posts
    $scope.getPosts = function() {
        $http.get('/api/posts')
            .then(function(response) {
                console.log('Posts retrieved:', response.data);
                $scope.posts = response.data;
                $scope.posts.forEach(function(post) {
                    post.liked = post.likes.some(like => like.user_id === $scope.currentUser.id);
                });
            })
            .catch(function(error) {
                console.error('Error fetching posts:', error);
            });
    };

    // Create a new post
    $scope.createPost = function() {
        if (!$scope.newPost.content) return;
        
        console.log('Creating post:', $scope.newPost);
        
        $http.post('/api/posts', $scope.newPost)
            .then(function(response) {
                console.log('Post created:', response.data);
                $scope.posts.unshift(response.data);
                $scope.newPost.content = '';
            })
            .catch(function(error) {
                console.error('Error creating post:', error);
                alert('Error creating post. Please try again.');
            });
    };

    // Delete a post
    $scope.deletePost = function(post) {
        if (!confirm('Are you sure you want to delete this post?')) return;

        $http.delete('/api/posts/' + post.id)
            .then(function() {
                const index = $scope.posts.indexOf(post);
                $scope.posts.splice(index, 1);
            })
            .catch(function(error) {
                console.error('Error deleting post:', error);
                alert('Error deleting post. Please try again.');
            });
    };

    // Toggle like on a post
    $scope.toggleLike = function(post) {
        $http.post('/api/posts/' + post.id + '/like')
            .then(function(response) {
                if (response.data.liked) {
                    post.likes.push({ user_id: $scope.currentUser.id });
                } else {
                    post.likes = post.likes.filter(like => like.user_id !== $scope.currentUser.id);
                }
                post.liked = response.data.liked;
            })
            .catch(function(error) {
                console.error('Error toggling like:', error);
                alert('Error toggling like. Please try again.');
            });
    };

    // Add a comment to a post
    $scope.addComment = function(post) {
        if (!post.newComment) return;

        $http.post('/api/posts/' + post.id + '/comments', {
            content: post.newComment
        })
            .then(function(response) {
                post.comments.push(response.data);
                post.newComment = '';
            })
            .catch(function(error) {
                console.error('Error adding comment:', error);
                alert('Error adding comment. Please try again.');
            });
    };

    // Initial load of posts
    $scope.getPosts();
}]);