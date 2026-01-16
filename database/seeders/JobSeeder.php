<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\createJob;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Jobs posted by John (user_id: 2)
        createJob::create([
            'title' => 'Senior PHP Developer',
            'category_id' => 1,
            'job_type_id' => 1,
            'user_id' => 2,
            'vacancy' => 3,
            'salary' => '$80,000 - $100,000',
            'location' => 'New York',
            'description' => 'We are looking for an experienced PHP Developer to join our team. You will be responsible for developing and maintaining web applications.',
            'benefits' => 'Health insurance, 401k, Flexible hours',
            'responsibility' => 'Develop and maintain web applications, Write clean code, Collaborate with team',
            'qualifications' => 'Bachelor degree in CS, 5+ years PHP experience',
            'keywords' => 'PHP, Laravel, MySQL, JavaScript',
            'experience' => '5',
            'company_name' => 'Tech Solutions Inc',
            'company_location' => 'New York, NY',
            'company_website' => 'https://techsolutions.com',
            'status' => 1,
            'isFeature' => 1,
        ]);

        createJob::create([
            'title' => 'Frontend Developer',
            'category_id' => 1,
            'job_type_id' => 2,
            'user_id' => 2,
            'vacancy' => 2,
            'salary' => '$60,000 - $80,000',
            'location' => 'San Francisco',
            'description' => 'Join our team as a Frontend Developer. Build responsive and user-friendly interfaces.',
            'benefits' => 'Health insurance, Remote work',
            'responsibility' => 'Build UI components, Optimize performance',
            'qualifications' => 'Bachelor degree, 3+ years experience',
            'keywords' => 'React, JavaScript, CSS, HTML',
            'experience' => '3',
            'company_name' => 'Web Innovations',
            'company_location' => 'San Francisco, CA',
            'company_website' => 'https://webinnovations.com',
            'status' => 1,
            'isFeature' => 0,
        ]);

        // Jobs posted by Jane (user_id: 3)
        createJob::create([
            'title' => 'Digital Marketing Specialist',
            'category_id' => 2,
            'job_type_id' => 1,
            'user_id' => 3,
            'vacancy' => 1,
            'salary' => '$50,000 - $70,000',
            'location' => 'Los Angeles',
            'description' => 'We need a creative Digital Marketing Specialist to drive our online presence.',
            'benefits' => 'Health insurance, Bonus',
            'responsibility' => 'Manage social media, Create campaigns',
            'qualifications' => 'Marketing degree, 2+ years experience',
            'keywords' => 'SEO, Social Media, Content Marketing',
            'experience' => '2',
            'company_name' => 'Marketing Pro',
            'company_location' => 'Los Angeles, CA',
            'company_website' => 'https://marketingpro.com',
            'status' => 1,
            'isFeature' => 1,
        ]);

        createJob::create([
            'title' => 'Content Writer',
            'category_id' => 2,
            'job_type_id' => 3,
            'user_id' => 3,
            'vacancy' => 2,
            'salary' => '$40,000 - $55,000',
            'location' => 'Remote',
            'description' => 'Looking for a talented Content Writer to create engaging content.',
            'benefits' => 'Flexible hours, Remote work',
            'responsibility' => 'Write blog posts, Create content strategy',
            'qualifications' => 'English degree, Portfolio required',
            'keywords' => 'Content Writing, SEO, Blogging',
            'experience' => '1',
            'company_name' => 'Content Hub',
            'company_location' => 'Remote',
            'company_website' => 'https://contenthub.com',
            'status' => 1,
            'isFeature' => 0,
        ]);

        // Jobs posted by Mike (user_id: 4)
        createJob::create([
            'title' => 'HR Manager',
            'category_id' => 3,
            'job_type_id' => 1,
            'user_id' => 4,
            'vacancy' => 1,
            'salary' => '$70,000 - $90,000',
            'location' => 'Chicago',
            'description' => 'Seeking an experienced HR Manager to lead our human resources department.',
            'benefits' => 'Health insurance, 401k, Paid time off',
            'responsibility' => 'Manage recruitment, Handle employee relations',
            'qualifications' => 'HR degree, 5+ years experience',
            'keywords' => 'HR, Recruitment, Employee Relations',
            'experience' => '5',
            'company_name' => 'Corporate Solutions',
            'company_location' => 'Chicago, IL',
            'company_website' => 'https://corpsolutions.com',
            'status' => 1,
            'isFeature' => 1,
        ]);

        createJob::create([
            'title' => 'Graphic Designer',
            'category_id' => 4,
            'job_type_id' => 2,
            'user_id' => 4,
            'vacancy' => 2,
            'salary' => '$45,000 - $65,000',
            'location' => 'Austin',
            'description' => 'Creative Graphic Designer needed to create stunning visual designs.',
            'benefits' => 'Health insurance, Creative environment',
            'responsibility' => 'Design graphics, Create brand materials',
            'qualifications' => 'Design degree, Portfolio required',
            'keywords' => 'Photoshop, Illustrator, Design',
            'experience' => '2',
            'company_name' => 'Design Studio',
            'company_location' => 'Austin, TX',
            'company_website' => 'https://designstudio.com',
            'status' => 1,
            'isFeature' => 0,
        ]);
    }
}
