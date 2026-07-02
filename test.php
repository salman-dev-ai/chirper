// Create a new user
$user = \App\Models\User::create([
    'name' => 'Eloquent Expert',
    'email' => 'eloquent@expert.com',
    'password' => bcrypt('password')
]);

// Create a chirp for this user
$chirp = $user->chirps()->create([
    'message' => 'Eloquent makes database work a breeze!'
]);

// Access the relationship
echo $chirp->user->name; // "Eloquent Expert"

// Get all chirps
\App\Models\Chirp::all();

// Get recent chirps
\App\Models\Chirp::latest()->get();


// بدلاً من echo، استخدم dump
dump($chirp->user->name);

// في آخر سطر، اجعل الملف يُرجع (return) التغريدات
return \App\Models\Chirp::latest()->get();
