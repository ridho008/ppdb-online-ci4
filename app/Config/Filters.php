<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;

class Filters extends BaseConfig
{
	/**
	 * Configures aliases for Filter classes to
	 * make reading things nicer and simpler.
	 *
	 * @var array
	 */
	public $aliases = [
		'csrf'     => CSRF::class,
		'toolbar'  => DebugToolbar::class,
		'honeypot' => Honeypot::class,
		'auth' => \App\Filters\AuthFilter::class,
		'admin' => \App\Filters\AdminFilter::class,
		'siswa' => \App\Filters\SiswaFilter::class,
	];

	/**
	 * List of filter aliases that are always
	 * applied before and after every request.
	 *
	 * @var array
	 */
	public $globals = [
		'before' => [
			//'honeypot',
			'csrf',
			'auth' => ['except' => 
					[
					'auth/',
					'home/',
					'pendaftaran/',
					'/',
					'auth/loginSiswa',
					]
			],
		],
		'after'  => [
			'toolbar',
			// 'honeypot',
			
		],
	];

	/**
	 * List of filter aliases that works on a
	 * particular HTTP method (GET, POST, etc.).
	 *
	 * Example:
	 * 'post' => ['csrf', 'throttle']
	 *
	 * @var array
	 */
	public $methods = [];

	/**
	 * List of filter aliases that should run on any
	 * before or after URI patterns.
	 *
	 * Example:
	 * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
	 *
	 * @var array
	 */
	public $filters = [
		'siswa' => [
			'before' => [
				'auth/logoutSiswa',
				'siswa/',
				'admin/',
				'jurusan/', 'agama/',
				'banner/', 'jalurMasuk',
				'pendidikan', 'penghasilan',
				'tahunAjaran', 'admin/beranda',
				'admin/pengaturan',
			],
			'after' => [
				'auth/',
				'admin/', 'jurusan/',
				'auth/loginSiswa',
				'pendaftaran',
			],
		],

		// jika sudah login, boleh akses berikut ini
		'admin' => [
			'before' => [
				'auth/logout',
			],
			// jika sudah login, tidak boleh akses berikut ini
			'after' => [
				'siswa',
				'auth/',
				'auth/loginSiswa',
			],
		],
	];
}

// 'auth' => ['except' => 
// 				[
// 					'/',
// 					'admin', 'admin/*',
// 					'admin', 'pengaturan',
// 					'pekerjaan', 'pekerjaan/*',
// 					'pendidikan', 'pendidikan/*',
// 					'agama', 'agama/*',
// 					'user', 'user/*',
// 					'penghasilan', 'penghasilan/*',
// 					'tahunAjaran', 'tahunAjaran/*',
// 					'jurusan', 'jurusan/*',
// 				]
// 			],