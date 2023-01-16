<aside id="sidebar-wrapper">
	<div class="sidebar-brand">
		<a href="index.html">Stisla</a>
	</div>
	<div class="sidebar-brand sidebar-brand-sm">
		<a href="index.html">St</a>
	</div>
	<ul class="sidebar-menu">
		<li>
			<a class="nav-link" href="<?= base_url('dashboard') ?>"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a>
		</li>
		<li class="menu-header">MASTER</li>
		<li>
			<a class="nav-link" href="<?= base_url('user') ?>"><i class="fas fa-users"></i> <span>User</span></a>
		</li>
		<li>
			<a class="nav-link" href="<?= base_url('Sifat_Surat') ?>"><i class="fas fa-users"></i> <span>Sifat Surat</span></a>
		</li>
		<li>
			<a class="nav-link" href="<?= base_url('Klasifikasi') ?>"><i class="fas fa-users"></i> <span>Klasifikasi</span></a>
		</li>

		<li class="nav-item dropdown">
			<a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Transaksi Surat</span></a>
			<ul class="dropdown-menu">
				<li><a class="nav-link" href="<?= base_url('Surat_Masuk') ?>">Surat Masuk</a></li>
				<li><a class="nav-link" href="<?= base_url('Surat_Keluar') ?>">Surat Keluar</a></li>
			</ul>
		</li>

		<li class="nav-item dropdown">
			<a href="#" class="nav-link has-dropdown"><i class="fas fa-book"></i> <span>Buku Agenda</span></a>
			<ul class="dropdown-menu">
				<li><a class="nav-link" href="<?= base_url('Buku_Agenda/surat_masuk') ?>">Surat Masuk</a></li>
				<li><a class="nav-link" href="<?= base_url('Surat_Keluar') ?>">Surat Keluar</a></li>
			</ul>
		</li>

		<li>
			<a class="nav-link" href="<?= base_url('Klasifikasi') ?>"><i class="fas fa-file-archive"></i> <span>Galeri File</span></a>
		</li>
		<li>
			<a class="nav-link" href="<?= base_url('Ubah_Password') ?>"><i class="fas fa-key"></i> <span>Ubah Password</span></a>
		</li>
		<li>
			<a class="nav-link" href="<?= base_url('Tentang_Aplikasi') ?>"><i class="fas fa-info-circle"></i> <span>Tentang Aplikasi</span></a>
		</li>
	</ul>
</aside>
