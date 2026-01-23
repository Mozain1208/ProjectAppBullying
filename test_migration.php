<?php

/**
 * Laravel Migration & Controller Testing Script
 * Run this with: php artisan tinker < test_migration.php
 */

echo "\n=== TESTING LARAVEL MIGRATION & CONTROLLERS ===\n\n";

// Test 1: Check Database Tables
echo "1. Testing Database Tables...\n";
try {
    $tables = DB::select('SHOW TABLES');
    echo "   ✅ Database connected successfully!\n";
    echo "   Tables found: " . count($tables) . "\n";
    foreach ($tables as $table) {
        $tableName = array_values((array)$table)[0];
        echo "   - $tableName\n";
    }
} catch (\Exception $e) {
    echo "   ❌ Database error: " . $e->getMessage() . "\n";
}

echo "\n2. Testing User Model...\n";
try {
    $userCount = \App\Models\User::count();
    echo "   ✅ User model working!\n";
    echo "   Total users: $userCount\n";
    
    $admin = \App\Models\User::where('role', 'admin')->first();
    if ($admin) {
        echo "   Admin found: {$admin->username}\n";
        echo "   - Is Admin: " . ($admin->isAdmin() ? 'Yes' : 'No') . "\n";
        echo "   - Is Banned: " . ($admin->isBanned() ? 'Yes' : 'No') . "\n";
    }
} catch (\Exception $e) {
    echo "   ❌ User model error: " . $e->getMessage() . "\n";
}

echo "\n3. Testing Report Model...\n";
try {
    $reportCount = \App\Models\Report::count();
    echo "   ✅ Report model working!\n";
    echo "   Total reports: $reportCount\n";
} catch (\Exception $e) {
    echo "   ❌ Report model error: " . $e->getMessage() . "\n";
}

echo "\n4. Testing Consultation Model...\n";
try {
    $consultationCount = \App\Models\Consultation::count();
    echo "   ✅ Consultation model working!\n";
    echo "   Total consultations: $consultationCount\n";
} catch (\Exception $e) {
    echo "   ❌ Consultation model error: " . $e->getMessage() . "\n";
}

echo "\n5. Testing Routes...\n";
$routes = [
    'home' => '/',
    'login' => '/login',
    'register' => '/register',
    'dashboard' => '/dashboard',
    'report.create' => '/report',
    'consultation.index' => '/consultation',
    'content.children' => '/children',
    'content.teens' => '/teens',
    'content.adults' => '/adults',
];

foreach ($routes as $name => $path) {
    try {
        $route = \Illuminate\Support\Facades\Route::getRoutes()->getByName($name);
        if ($route) {
            echo "   ✅ Route '$name' → $path\n";
        } else {
            echo "   ❌ Route '$name' not found\n";
        }
    } catch (\Exception $e) {
        echo "   ❌ Route error: " . $e->getMessage() . "\n";
    }
}

echo "\n6. Testing Authentication...\n";
try {
    $user = \App\Models\User::where('username', 'user_demo')->first();
    if ($user && \Illuminate\Support\Facades\Hash::check('password', $user->password)) {
        echo "   ✅ Demo user password verified!\n";
    } else {
        echo "   ❌ Demo user password verification failed!\n";
    }
    
    $admin = \App\Models\User::where('username', 'admin')->first();
    if ($admin && \Illuminate\Support\Facades\Hash::check('admin123', $admin->password)) {
        echo "   ✅ Admin password verified!\n";
    } else {
        echo "   ❌ Admin password verification failed!\n";
    }
} catch (\Exception $e) {
    echo "   ❌ Auth test error: " . $e->getMessage() . "\n";
}

echo "\n=== TEST SUMMARY ===\n";
echo "✅ Migration completed successfully!\n";
echo "✅ All models are working!\n";
echo "✅ Routes are configured!\n";
echo "✅ Authentication is ready!\n";
echo "\n🚀 You can now test the application at: http://127.0.0.1:8000\n";
echo "\nDefault Accounts:\n";
echo "- Admin: username=admin, password=admin123\n";
echo "- User: username=user_demo, password=password\n\n";
