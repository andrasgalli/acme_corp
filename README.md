Hi!<br>
<p>
I've created a solution for the Tech Lead assignment. The solution is not full, not every aspect is created,
but I've tried to use as many technical details, as possible.
</p><br>
<p class="text-lg">Setup</p>
<p>
<ul class="list-disc p-4">
<li>Make .env file, and set up the database</li>
<li>Run php artisan migrate</li>
<li>Run php artisan db:seed</li>
<li>Run npm install</li>
<li>Run npm run dev</li>
<li>Run php artisan serve to start backend</li>
<li>Navigate to the backend address pointed by php artisan serves</li>
</ul>
</p>
<p class="text-lg">I've used the following technologies/solutions:</p>
<p>
<ul class="list-disc p-4">
<li>I used PHP 8.3.x</li>
<li>Enums and named arguments are used</li>
<li>Laravel 11</li>
<li>Laravel Breeze with Blade templating</li>
<li>For saving data I've used Actions based on lorisleiva/laravel-actions. This is a good approach when we want to do the same from Controller/Job/etc. </li>
<li>For the used Models, I've communicate with them through Repository classes. This is a very reusable approach.</li>
<li>For Request required validation I've created request classes.</li>
<li>For Admin page I've created the is_admin Gate.</li>
<li>For External missions I've created a Service which currently gives back mock data. First is checks if there is any records in the database. If the table is empty it creates 10 external missions with a factory. The service caches the data.</li>
<li>Input fields for Payment details are not created, because they comes from the Payment Processors server. Usually during the payment flow, the user is redirected to the Payment Processors Payment Page. It is because PCI-DSS regulations.</li>
<li>It made me think, that how can I integrate the external missions, that comes from an API with the campaigns the users can create. Finally I've saved them into a different tables.</li>
<li>Donations are saved into a table. I've created a table for payments for the donations, but because there is no integrated payment processor, i haven't used the table. For Payments it would be ideal to use Laravel Cachier, and integrate the Payment Processor API into that.</li>
<li>In the navigation the 'Profile' item only appears if the user is authenticated.</li>
<li>In the navigation the 'Admin' item only appears if the user passes the is_admin guard.</li>
<li>Donation only possible for authenticated user.</li>
<li>You can register to create your user.</li>
<li>To become is_admin please log in with admin@acme.com, with the password 'password'</li>
</ul>
</p>
<p class="text-lg">Other concerns</p>
<p>
<ul class="list-disc p-4">
<li>For email sending I would use queueable jobs</li>
<li>For in dept authorization i would use laravel policies. BUT I'm really a fan of spatie/laravel-permission, which is a great RBAC implementation.
</li>
<li>For multilang I would use spatie/laravel-translatable</li>
<li>For listing purposes on the admin panel I would use yajra/laravel-datatables-buttons</li>
</ul>
</p>
