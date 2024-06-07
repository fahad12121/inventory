<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Support\Facades\Auth;
class UserImport implements ToModel, WithHeadingRow, WithChunkReading
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return User::updateOrCreate(
            ['email' => $row['email']], // Unique identifier to check for duplicates
            [
                'company_name' => $row['company'],
                'name'  => $row['name'],
                'password' => Hash::make('123456'),
                'is_active' => 1,
                'role_id' => 3,
                'user_id' => Auth::user()->id,
            ]
        );
    }

    public function chunkSize(): int
    {
        return 1000; // Adjust chunk size as needed
    }
}
