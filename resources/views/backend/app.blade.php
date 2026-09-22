<!DOCTYPE html>
<html lang="en">
@php
    $info = \App\Models\Information::first();
    $logoUrl = ($info && !empty($info->site_logo))
        ? asset('uploads/img/'.$info->site_logo)
        : asset('backend/img/default-logo.svg'); 
    $adminTheme = require base_path('utils/configurations/admin/theme.php');
@endphp
<head>
    <meta charset="utf-8" />
    <title>{{ $info->site_name ?? 'Admin' }} Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="Admin Panel" name="description" />
    <meta name="author" content="Coderthemes" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="shortcut icon" href="{{ $logoUrl }}">

    <link href="{{ asset('backend/css/vendor/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" />
    <link href="{{ asset('backend/css/icons.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('backend/css/app-creative.min.css')}}" rel="stylesheet" id="app-style" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

    <style>
        :root{ 
            --ls-w: 252px;
            --bg-premium: #0f172a;  
            --bg-footer: #ffffff;   
            --header-h: 70px;       
        } 

        @media print{ .no-print,.no-print *{ display:none !important; } }

        [data-layout-color="light"] .content-page,
        [data-layout-color="light"] .content-page *{ color:#111; }

        @media (min-width: 992px){
            body.with-sidebar{ padding-left: var(--ls-w); }
        }

        .leftside-menu.leftside-menu-detached{
            min-width: var(--ls-w) !important;
            max-width: var(--ls-w) !important;
            background-color: var(--bg-premium) !important;
            padding-top: 0 !important;
        }

        .navbar-custom {
            background-color: var(--bg-premium) !important;
            height: var(--header-h) !important;
            min-height: var(--header-h) !important;
            padding: 0 !important;
            display: flex !important;
            justify-content: space-between !important; 
            align-items: center !important;
            position: fixed !important; 
            top: 0;
            left: 0;
            width: 100%;
            z-index: 9999; 
        }

        .wrapper {
            padding-top: var(--header-h) !important;
        }
        
        .topnav-logo {
            width: var(--ls-w); 
            height: var(--header-h);
            background-color: var(--bg-premium);
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            flex-shrink: 0; 
            border-right: 1px solid rgba(255,255,255,0.05);
        }

        .brand-logo {
            max-height: 40px; 
            max-width: 80%;
            object-fit: contain;
        }
        
        .navbar-right-content {
            display: flex;
            align-items: center;
            flex-grow: 1;
            padding-left: 15px; 
            padding-right: 20px;
        }

        .button-menu-mobile {
            color: #fff;
            cursor: pointer;
            margin-right: auto; 
            display: flex;
            align-items: center;
            width: auto;
            border: none;
            background: transparent;
        }

        .navbar-custom .nav-link, .navbar-custom .noti-icon { color: #94a3b8 !important; }
        .navbar-custom .nav-link:hover, .navbar-custom .noti-icon:hover { color: #ffffff !important; }

        @media (max-width: 991.98px){
            .topnav-logo {
                display: none !important; 
            }
            
            .leftside-menu.leftside-menu-detached{
                position: relative;
                width: 100% !important; min-width: 100% !important; max-width: 100% !important;
                border-right: 0; box-shadow: none;
            }
            body.with-sidebar{ padding-left:0 !important; }
        }

        .leftbar-user{ 
            text-align:center; padding: 14px 10px; 
            background-color: var(--bg-premium) !important;
        }
        .leftbar-user-name{ color:#fff; font-weight:600; font-size:15px; margin-top:6px; display:block; }
        .leftbar-user img.rounded-circle{ width:42px; height:42px; object-fit:cover; }
        .content-page .content{ padding-top: 14px; }
        .footer{ border-top: 1px solid rgba(0,0,0,.05); background-color: var(--bg-footer) !important; }

        :root{
            --admin-background: {{ $adminTheme['background'] }};
            --admin-surface: {{ $adminTheme['surface'] }};
            --admin-surface-muted: {{ $adminTheme['surface_muted'] }};
            --admin-text-primary: {{ $adminTheme['text_primary'] }};
            --admin-text-secondary: {{ $adminTheme['text_secondary'] }};
            --admin-text-muted: {{ $adminTheme['text_muted'] }};
            --admin-border: {{ $adminTheme['border'] }};
            --admin-primary: {{ $adminTheme['primary'] }};
            --admin-primary-hover: {{ $adminTheme['primary_hover'] }};
            --admin-primary-text: {{ $adminTheme['primary_text'] }};
            --admin-accent: {{ $adminTheme['accent'] }};
            --admin-accent-hover: {{ $adminTheme['accent_hover'] }};
            --admin-accent-soft: {{ $adminTheme['accent_soft'] }};
            --bg-premium: var(--admin-surface);
            --bg-footer: var(--admin-surface);
            --ct-body-bg: var(--admin-background);
            --ct-body-color: var(--admin-text-secondary);
            --ct-link-color: var(--admin-primary);
            --ct-link-hover-color: var(--admin-primary-hover);
            --ct-border-color: var(--admin-border);
            --ct-component-active-bg: var(--admin-primary);
            --ct-component-active-color: var(--admin-primary-text);
            --ct-text-muted: var(--admin-text-muted);
            --ct-card-bg: var(--admin-surface);
            --ct-card-border-color: var(--admin-border);
            --ct-input-border-color: var(--admin-border);
            --ct-menu-item: var(--admin-text-secondary);
            --ct-menu-item-hover: var(--admin-primary);
            --ct-menu-item-active: var(--admin-primary);
        }
        body,.content-page{ background:var(--admin-background) !important; }
        .navbar-custom{ background:var(--admin-primary) !important; border-bottom:1px solid var(--admin-primary-hover); box-shadow:0 5px 18px rgba(65,18,100,.16); }
        .navbar-custom::after{ position:absolute; right:0; bottom:-1px; left:0; height:2px; background:var(--admin-accent); content:""; }
        .admin-topbar-inner{ display:flex; align-items:center; justify-content:space-between; width:100%; min-height:68px; padding:0 18px; gap:18px; }
        .admin-topbar-start,.admin-topbar-actions>li{ display:flex; align-items:center; }
        .admin-topbar-start{ min-width:0; gap:10px; }
        .admin-menu-toggle{ display:inline-flex !important; align-items:center; justify-content:center; width:38px !important; height:38px; margin:0 !important; border:1px solid rgba(255,255,255,.3) !important; border-radius:6px; color:var(--admin-primary-text) !important; background:rgba(255,255,255,.08) !important; transition:border-color .18s ease,background-color .18s ease,color .18s ease; }
        .admin-menu-toggle:hover,.admin-menu-toggle:focus{ border-color:var(--admin-accent) !important; color:var(--admin-text-primary) !important; background:var(--admin-accent) !important; }
        .admin-menu-toggle .lines{ width:17px; margin:0; }
        .admin-menu-toggle .lines span{ display:block; width:17px; height:2px; margin:4px 0; border-radius:2px; background:currentColor; }
        .admin-brand{ display:flex; align-items:center; min-width:0; gap:10px; color:var(--admin-primary-text); text-decoration:none; }
        .admin-brand:hover{ color:var(--admin-primary-text); }
        .admin-brand img{ width:36px; height:36px; padding:4px; border:1px solid rgba(255,255,255,.3); border-radius:6px; object-fit:contain; background:var(--admin-surface); transition:border-color .18s ease,transform .18s ease; }
        .admin-brand:hover img{ border-color:var(--admin-accent); transform:translateY(-1px); }
        .admin-brand-copy,.admin-user-meta{ display:flex; flex-direction:column; min-width:0; line-height:1.15; }
        .admin-brand-copy strong{ overflow:hidden; max-width:220px; color:var(--admin-primary-text); font-size:14px; text-overflow:ellipsis; white-space:nowrap; }
        .admin-brand-copy small,.admin-user-meta small{ margin-top:3px; color:rgba(255,255,255,.68); font-size:11px; }
        .admin-topbar-actions{ display:flex; align-items:center; gap:6px; }
        .admin-topbar-link{ display:inline-flex !important; align-items:center; min-height:38px; gap:7px; padding:7px 10px !important; border:1px solid rgba(255,255,255,.22); border-radius:6px; color:var(--admin-primary-text) !important; background:rgba(255,255,255,.07); transition:border-color .18s ease,background-color .18s ease,color .18s ease,transform .18s ease; }
        .admin-topbar-link:hover,.admin-topbar-link:focus,.admin-topbar-link[aria-expanded="true"]{ border-color:var(--admin-accent); color:var(--admin-text-primary) !important; background:var(--admin-accent); transform:translateY(-1px); }
        .navbar-custom .admin-topbar-link:hover .noti-icon,.navbar-custom .admin-topbar-link:focus .noti-icon,.navbar-custom .admin-topbar-link[aria-expanded="true"] .noti-icon{ color:var(--admin-text-primary) !important; }
        .admin-topbar-link .noti-icon{ margin:0 !important; font-size:19px !important; line-height:1 !important; }
        .admin-topbar-label{ font-size:12px; font-weight:600; }
        .admin-user-link .account-user-avatar img{ width:30px; height:30px; border:2px solid rgba(255,255,255,.62); object-fit:cover; }
        .admin-user-meta{ max-width:150px; text-align:left; }
        .admin-user-meta strong{ overflow:hidden; color:var(--admin-primary-text); font-size:12px; text-overflow:ellipsis; white-space:nowrap; }
        .admin-user-chevron{ color:rgba(255,255,255,.68); font-size:16px; }
        .admin-topbar-link:hover .admin-user-meta strong,.admin-topbar-link:focus .admin-user-meta strong,.admin-topbar-link[aria-expanded="true"] .admin-user-meta strong{ color:var(--admin-text-primary); }
        .admin-topbar-link:hover .admin-user-meta small,.admin-topbar-link:focus .admin-user-meta small,.admin-topbar-link[aria-expanded="true"] .admin-user-meta small,.admin-topbar-link:hover .admin-user-chevron,.admin-topbar-link:focus .admin-user-chevron,.admin-topbar-link[aria-expanded="true"] .admin-user-chevron{ color:var(--admin-text-secondary); }
        .leftside-menu.leftside-menu-detached,.leftbar-user{ background:var(--admin-primary) !important; }
        .leftside-menu.leftside-menu-detached{ border-right:1px solid var(--admin-primary-hover); }
        .leftbar-user-name{ color:var(--admin-primary-text) !important; }
        .leftside-menu .side-nav-link{ position:relative; transition:background-color .18s ease,color .18s ease; }
        .leftside-menu .side-nav-link:hover,.leftside-menu .side-nav-link:focus,.leftside-menu .side-nav-link.active{ color:var(--admin-primary) !important; background:var(--admin-surface-muted); }
        .leftside-menu .side-nav-link:hover::before,.leftside-menu .side-nav-link.active::before{ position:absolute; top:8px; bottom:8px; left:0; width:3px; border-radius:0 3px 3px 0; background:var(--admin-accent); content:""; }
        .leftside-menu .side-nav-link:hover i,.leftside-menu .side-nav-link:focus i,.leftside-menu .side-nav-link.active i{ color:var(--admin-primary) !important; }
        .btn-primary,.bg-primary{ border-color:var(--admin-primary) !important; color:var(--admin-primary-text) !important; background:var(--admin-primary) !important; }
        .btn-primary:hover{ border-color:var(--admin-primary-hover) !important; background:var(--admin-primary-hover) !important; }
        .text-primary{ color:var(--admin-primary) !important; }
        .form-control:focus,.form-select:focus{ border-color:var(--admin-primary); box-shadow:0 0 0 .15rem rgba(65,18,100,.12); }
        @media(max-width:575.98px){ .admin-topbar-inner{ min-height:62px; padding:0 10px; gap:8px; }.admin-brand-copy strong{ max-width:110px; font-size:12px; }.admin-brand-copy small,.admin-topbar-label,.admin-user-meta{ display:none; }.admin-topbar-link{ width:38px; justify-content:center; padding:5px !important; } }
    </style>
    @stack('css')
</head>

<body class="loading with-sidebar" data-layout="detached" data-layout-color="light" data-rightbar-onstart="true">

    <div class="navbar-custom topnav-navbar topnav-navbar-dark">
        <div class="admin-topbar-inner">
            <div class="admin-topbar-start">
                <button type="button" class="admin-menu-toggle" id="adminSidebarToggle" aria-label="Toggle sidebar" aria-controls="appSidebar" aria-expanded="true" title="Toggle sidebar">
                    <span class="lines"><span></span><span></span><span></span></span>
                </button>
                <a class="admin-brand" href="{{ route('admin.dashboard') }}">
                    <img src="{{ $logoUrl }}" alt="{{ $info->site_name ?? 'Admin' }} Logo">
                    <span class="admin-brand-copy">
                        <strong>{{ $info->site_name ?? 'TriZync' }}</strong>
                        <small>Administration</small>
                    </span>
                </a>
            </div>

            <ul class="list-unstyled topbar-menu admin-topbar-actions mb-0">
                <li class="notification-list">
                    <a class="nav-link admin-topbar-link" href="{{ route('front.home') }}" target="_blank" rel="noopener" aria-label="View storefront" title="View storefront">
                        <i class="dripicons-home noti-icon"></i>
                        <span class="admin-topbar-label">Storefront</span>
                    </a>
                </li>

                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle nav-user arrow-none me-0 admin-topbar-link admin-user-link" data-bs-toggle="dropdown" id="topbar-userdrop" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="account-user-avatar">
                            <img src="{{ getImage('uploads/img', Auth::user()->image) }}" alt="user-image" class="rounded-circle">
                        </span>
                        <span class="admin-user-meta">
                            <strong>{{ auth()->user()->first_name }}</strong>
                            <small>Account</small>
                        </span>
                        <i class="mdi mdi-chevron-down admin-user-chevron" aria-hidden="true"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown" aria-labelledby="topbar-userdrop">
                        <div class="dropdown-header noti-title"><h6 class="m-0">Welcome !</h6></div>

                        <a href="{{ route('admin.profile') }}" class="dropdown-item notify-item">
                            <i class="mdi mdi-account-circle me-1"></i><span>My Account</span>
                        </a>
                        <a href="{{ route('admin.password') }}" class="dropdown-item notify-item">
                            <i class="mdi mdi-shield-lock me-1"></i><span>Change Password</span>
                        </a>

                        @can('product.delete')
                        <a href="{{ route('admin.settings.index') }}" class="dropdown-item notify-item">
                            <i class="mdi mdi-cog me-1"></i><span>Settings</span>
                        </a>
                        @endcan

                        <a class="dropdown-item notify-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="mdi mdi-logout me-1"></i><span>Logout</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="container-fluid">
        <div class="wrapper">
            <div class="leftside-menu leftside-menu-detached">
                <div class="leftbar-user">
                    <span class="leftbar-user-name mt-2">{{ auth()->user()->name }}</span>
                </div>
                @include('backend.partials.navbar')
                <div class="clearfix"></div>
            </div>
            <button type="button" class="admin-sidebar-backdrop" id="adminSidebarBackdrop" aria-label="Close sidebar"></button>

            <div class="content-page">
                <div class="content">
                    @yield('content')
                </div> 
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                {{ date('Y') }} &copy; <a href="https://triizync.com/" target="_blank" rel="noopener noreferrer">Trizync Solution</a> V-2.5
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-end footer-links d-none d-md-block">All rights reserved.</div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div> 
        </div> 
    </div>

    <div class="end-bar">
        <div class="rightbar-title">
            <a href="javascript:void(0);" class="end-bar-toggle float-end"><i class="dripicons-cross noti-icon"></i></a>
            <h5 class="m-0 text-light">Settings</h5>
        </div>
        <div class="rightbar-content h-100" data-simplebar>
            <div class="p-3">
                <h5 class="mt-3">Color Scheme</h5><hr class="mt-1" />
                <div class="form-check form-switch mb-1">
                    <input type="checkbox" class="form-check-input" name="color-scheme-mode" value="light" id="light-mode-check" checked />
                    <label class="form-check-label" for="light-mode-check">Light Mode</label>
                </div>
                <div class="form-check form-switch mb-1">
                    <input type="checkbox" class="form-check-input" name="color-scheme-mode" value="dark" id="dark-mode-check" />
                    <label class="form-check-label" for="dark-mode-check">Dark Mode</label>
                </div>
                <h5 class="mt-4">Width</h5><hr class="mt-1" />
                <div class="form-check form-switch mb-1">
                    <input type="checkbox" class="form-check-input" name="width" value="fluid" id="fluid-check" checked />
                    <label class="form-check-label" for="fluid-check">Fluid</label>
                </div>
                <div class="form-check form-switch mb-1">
                    <input type="checkbox" class="form-check-input" name="width" value="boxed" id="boxed-check" />
                    <label class="form-check-label" for="boxed-check">Boxed</label>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="common_modal" tabindex="-1" aria-hidden="true"></div>
    <div class="rightbar-overlay"></div>

    <script>
        setInterval(function() {
            fetch('/run-pending-calls');
        }, 60000); 
    </script>
    @include('backend.partials.js')
    <script>
        (() => {
            const body = document.body;
            const toggle = document.getElementById('adminSidebarToggle');
            const backdrop = document.getElementById('adminSidebarBackdrop');
            const sidebar = document.getElementById('appSidebar');
            const desktop = window.matchMedia('(min-width: 992px)');

            if (!toggle) return;

            const syncState = () => {
                if (desktop.matches) {
                    body.classList.remove('sidebar-open');
                    body.classList.toggle('sidebar-collapsed', localStorage.getItem('adminSidebarCollapsed') === '1');
                    toggle.setAttribute('aria-expanded', body.classList.contains('sidebar-collapsed') ? 'false' : 'true');
                } else {
                    body.classList.remove('sidebar-collapsed');
                    toggle.setAttribute('aria-expanded', body.classList.contains('sidebar-open') ? 'true' : 'false');
                }
            };

            const closeMobileSidebar = () => {
                if (!desktop.matches) {
                    body.classList.remove('sidebar-open');
                    toggle.setAttribute('aria-expanded', 'false');
                }
            };

            toggle.addEventListener('click', () => {
                if (desktop.matches) {
                    const collapsed = body.classList.toggle('sidebar-collapsed');
                    localStorage.setItem('adminSidebarCollapsed', collapsed ? '1' : '0');
                    toggle.setAttribute('aria-expanded', collapsed ? 'false' : 'true');
                    return;
                }

                const open = body.classList.toggle('sidebar-open');
                toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
            });

            backdrop?.addEventListener('click', closeMobileSidebar);
            sidebar?.querySelectorAll('.menu-link').forEach(link => {
                const label = link.querySelector('.menu-text')?.textContent?.trim();
                if (label) link.setAttribute('title', label);
            });
            sidebar?.addEventListener('click', event => {
                if (desktop.matches && body.classList.contains('sidebar-collapsed') && event.target.closest('.has-dropdown')) {
                    body.classList.remove('sidebar-collapsed');
                    localStorage.setItem('adminSidebarCollapsed', '0');
                    toggle.setAttribute('aria-expanded', 'true');
                }
                if (event.target.closest('a')) closeMobileSidebar();
            }, true);
            document.addEventListener('keydown', event => {
                if (event.key === 'Escape') closeMobileSidebar();
            });
            desktop.addEventListener?.('change', syncState);
            syncState();
        })();
    </script>
    @stack('script')
</body>
</html>
