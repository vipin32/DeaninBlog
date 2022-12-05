class CommentsController < ApplicationController
    before_action :authenticate_user!
    before_action :set_post

    def create
        @comment = @post.comments.create(comments_params)
        @comment.user = current_user

        if @comment.save
            flash[:notice] = 'Comment has been created successfully!'
        else
            flash[:alert] = 'Comment has not been created!'
        end

        redirect_to post_path(@post)
    end

    def destroy
        @comment = @post.comments.find(params[:id])
        
        if @comment.destroy
            flash[:notice] = 'Comment has been deleted!'
        else
            flash[:alert] = 'Comment has not been deleted!'
        end

        redirect_to post_path(@post)
    end

    private

    def set_post
        @post = Post.find(params[:post_id])
    end

    def comments_params
        params.require(:comment).permit(:body)
    end
end
