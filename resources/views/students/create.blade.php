@extends('layouts.app')

@section('title', 'Register Student')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-md">
    <div class="border-b border-gray-200 pb-4 mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Student Registration Form</h2>
        <p class="text-gray-500 text-sm">Please fill out all the required information to register a new student.</p>
    </div>

    <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <!-- Student ID & Email -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="student_id" class="block text-sm font-semibold text-gray-700 mb-1">Student ID <span class="text-red-500">*</span></label>
                <input type="text" name="student_id" id="student_id" value="{{ old('student_id') }}" placeholder="e.g. 2023-10045"
                       class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('student_id') border-red-500 @else border-gray-300 @enderror">
                @error('student_id')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-semibold text-gray-700 mb-1">Email Address <span class="text-red-500">*</span></label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="e.g. student@example.com"
                       class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('email') border-red-500 @else border-gray-300 @enderror">
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- First, Middle, & Last Name -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <label for="first_name" class="block text-sm font-semibold text-gray-700 mb-1">First Name <span class="text-red-500">*</span></label>
                <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}" placeholder="First Name"
                       class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('first_name') border-red-500 @else border-gray-300 @enderror">
                @error('first_name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="middle_name" class="block text-sm font-semibold text-gray-700 mb-1">Middle Name <span class="text-gray-400">(Optional)</span></label>
                <input type="text" name="middle_name" id="middle_name" value="{{ old('middle_name') }}" placeholder="Middle Name"
                       class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('middle_name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="last_name" class="block text-sm font-semibold text-gray-700 mb-1">Last Name <span class="text-red-500">*</span></label>
                <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}" placeholder="Last Name"
                       class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('last_name') border-red-500 @else border-gray-300 @enderror">
                @error('last_name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Mobile Number, DOB & Gender -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <label for="mobile_number" class="block text-sm font-semibold text-gray-700 mb-1">Mobile Number <span class="text-red-500">*</span></label>
                <input type="text" name="mobile_number" id="mobile_number" value="{{ old('mobile_number') }}" placeholder="e.g. 09123456789"
                       class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('mobile_number') border-red-500 @else border-gray-300 @enderror">
                @error('mobile_number')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="date_of_birth" class="block text-sm font-semibold text-gray-700 mb-1">Date of Birth <span class="text-red-500">*</span></label>
                <input type="date" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth') }}"
                       class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('date_of_birth') border-red-500 @else border-gray-300 @enderror">
                @error('date_of_birth')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="gender" class="block text-sm font-semibold text-gray-700 mb-1">Gender <span class="text-red-500">*</span></label>
                <select name="gender" id="gender"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('gender') border-red-500 @else border-gray-300 @enderror">
                    <option value="" disabled {{ old('gender') ? '' : 'selected' }}>Select Gender</option>
                    <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                    <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
                </select>
                @error('gender')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Program & Year Level -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="program" class="block text-sm font-semibold text-gray-700 mb-1">Academic Program <span class="text-red-500">*</span></label>
                <select name="program" id="program"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('program') border-red-500 @else border-gray-300 @enderror">
                    <option value="" disabled {{ old('program') ? '' : 'selected' }}>Select Program</option>
                    <option value="BS in Information Technology" {{ old('program') == 'BS in Information Technology' ? 'selected' : '' }}>BS in Information Technology (BSIT)</option>
                    <option value="BS in Computer Science" {{ old('program') == 'BS in Computer Science' ? 'selected' : '' }}>BS in Computer Science (BSCS)</option>
                    <option value="BS in Information Systems" {{ old('program') == 'BS in Information Systems' ? 'selected' : '' }}>BS in Information Systems (BSIS)</option>
                    <option value="Associate in Computer Technology" {{ old('program') == 'Associate in Computer Technology' ? 'selected' : '' }}>Associate in Computer Technology (ACT)</option>
                </select>
                @error('program')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="year_level" class="block text-sm font-semibold text-gray-700 mb-1">Year Level <span class="text-red-500">*</span></label>
                <select name="year_level" id="year_level"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('year_level') border-red-500 @else border-gray-300 @enderror">
                    <option value="" disabled {{ old('year_level') ? '' : 'selected' }}>Select Year Level</option>
                    <option value="1st Year" {{ old('year_level') == '1st Year' ? 'selected' : '' }}>1st Year</option>
                    <option value="2nd Year" {{ old('year_level') == '2nd Year' ? 'selected' : '' }}>2nd Year</option>
                    <option value="3rd Year" {{ old('year_level') == '3rd Year' ? 'selected' : '' }}>3rd Year</option>
                    <option value="4th Year" {{ old('year_level') == '4th Year' ? 'selected' : '' }}>4th Year</option>
                </select>
                @error('year_level')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Address -->
        <div>
            <label for="address" class="block text-sm font-semibold text-gray-700 mb-1">Home Address <span class="text-red-500">*</span></label>
            <textarea name="address" id="address" rows="3" placeholder="Enter complete home address"
                      class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('address') border-red-500 @else border-gray-300 @enderror">{{ old('address') }}</textarea>
            @error('address')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Profile Picture File Upload -->
        <div>
            <label for="profile_picture" class="block text-sm font-semibold text-gray-700 mb-1">Profile Picture <span class="text-red-500">*</span></label>
            <input type="file" name="profile_picture" id="profile_picture" accept="image/*"
                   class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('profile_picture') border-red-500 @else border-gray-300 @enderror">
            <p class="text-gray-400 text-xs mt-1">Accepted formats: JPG, JPEG, PNG. Max file size: 2MB.</p>
            @error('profile_picture')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Form Actions -->
        <div class="flex items-center justify-end space-x-4 pt-4 border-t border-gray-200">
            <a href="{{ route('students.index') }}" class="px-6 py-2 border border-gray-300 text-gray-700 rounded-md hover:bg-gray-50 font-medium">Cancel</a>
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 font-medium shadow-sm transition">Register Student</button>
        </div>
    </form>
</div>
@endsection
