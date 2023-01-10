require 'net/http'

def get_users
  uri = URI('https://api.example.com/users')
  response = Net::HTTP.get(uri)
  # do something with the response
end


uri = URI('https://api.example.com/users')
uri.query = URI.encode_www_form(sort: 'desc')

request = Net::HTTP::Get.new(uri)
request['Authorization'] = 'Bearer xyz'

response = Net::HTTP.start(uri.hostname, uri.port, use_ssl: uri.scheme == 'https') do |http|
  http.request(request)
end
