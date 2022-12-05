Rails.application.routes.draw do
  
  devise_for :users, controllers: {
    sessions: 'users/sessions',
    registrations: 'users/registrations',
  }

  resources :posts do
    resources :comments
  end
  
  root "pages#home"

  get "about", to: "pages#about"

  get 'users/profile/:id', to: "users#profile", as: "user_profile"

  # Define your application routes per the DSL in https://guides.rubyonrails.org/routing.html

  # Defines the root path route ("/")
end
