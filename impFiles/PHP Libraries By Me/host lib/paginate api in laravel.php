paginate api results in laravel without using paginate
To paginate API results in Laravel without using the paginate() method, you can use the offset() and limit() methods in your API queries.

Here is an example of how you might do this:

Copy code
$page = request('page', 1);
$perPage = request('per_page', 10);

$results = Model::offset(($page - 1) * $perPage)->limit($perPage)->get();

return response()->json([
  'data' => $results,
  'current_page' => $page,
  'per_page' => $perPage,
  'total' => Model::count(),
]);

This code uses the offset() and limit() methods to retrieve a specific page of results from the database, based on the page and per_page query parameters. It then returns a JSON response with the paginated results, along with the current page, the number of results per page, and the total number of results.

You can modify this code to fit your specific needs and requirements. For example, you can use different query parameters for the page and per page values, or you can use different model and column names. You can also add additional query constraints or orderings to the API query.

By using the offset() and limit() methods to paginate API results, you can provide a more efficient and customizable pagination experience for your users.