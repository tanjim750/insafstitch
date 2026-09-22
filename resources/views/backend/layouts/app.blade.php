<!DOCTYPE html>
<html lang="en">
@php
    /** Load site info once */
    $info = \App\Models\Information::first();

    /** Build logo URL with safe fallback */
    $logoUrl = ($info && !empty($info->site_logo))
        ? asset('uploads/img/'.$info->site_logo)
        : asset('backend/img/default-logo.svg'); // fallback

    $adminTheme = require base_path('utils/configurations/admin/theme.php');
@endphp
<head>
    <meta charset="utf-8" />
    <title>{{ $info->site_name ?? 'Admin' }} Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="Admin Panel" name="description" />
    <meta name="author" content="Coderthemes" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ $logoUrl }}">

    <!-- Vendor / Theme CSS -->
    <link href="{{ asset('backend/css/vendor/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/css/icons.min.css') }}" rel="stylesheet" />

    {{-- ✅ MUST: Unicons (icons.min.css এর পরে) --}}
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">

    {{-- ✅ FORCE: uil class যেন Unicons font ই নেয় --}}
    <style>
        .uil{
            font-family: "unicons" !important;
            font-style: normal !important;
            font-weight: 400 !important;
            speak: none;
            display: inline-block;
            text-transform: none;
            line-height: 1;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
    </style>

    <link href="{{ asset('backend/css/app-creative.min.css') }}" rel="stylesheet" id="app-style" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

    <!-- Layout overrides -->
    <style>
        :root{
            --ls-w: 220px;
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
            --ct-input-bg: var(--admin-surface);
            --ct-input-color: var(--admin-text-primary);
            --ct-input-border-color: var(--admin-border);
            --ct-input-focus-border-color: var(--admin-primary);
            --ct-bg-dark-topbar: var(--admin-primary);
            --ct-bg-dark-topbar-search: var(--admin-primary-hover);
            --ct-nav-user-bg-dark-topbar: var(--admin-primary-hover);
            --ct-nav-user-border-dark-topbar: rgba(255,255,255,.14);
            --ct-bg-detached-leftbar: var(--admin-surface);
            --ct-menu-item: var(--admin-text-secondary);
            --ct-menu-item-hover: var(--admin-primary);
            --ct-menu-item-active: var(--admin-primary);
        }

        body{ background:var(--admin-background); color:var(--admin-text-secondary); }
        .navbar-custom.topnav-navbar-dark{ background:var(--admin-surface) !important; border-bottom:1px solid var(--admin-border); box-shadow:0 5px 18px rgba(65,18,100,.07); }
        .navbar-custom.topnav-navbar-dark::after{ position:absolute; right:0; bottom:-1px; left:0; height:2px; background:var(--admin-accent); content:""; }
        .admin-topbar-inner{ display:flex; align-items:center; justify-content:space-between; min-height:68px; gap:18px; }
        .admin-topbar-start{ display:flex; align-items:center; min-width:0; gap:10px; }
        .admin-menu-toggle{ display:inline-flex !important; align-items:center; justify-content:center; width:38px; height:38px; margin:0 !important; border:1px solid var(--admin-primary); border-radius:6px; color:var(--admin-primary); background:var(--admin-surface); transition:background-color .18s ease,color .18s ease; }
        .admin-menu-toggle:hover{ color:var(--admin-primary-text); background:var(--admin-primary); }
        .admin-menu-toggle .lines{ width:17px; margin:0; }
        .admin-menu-toggle .lines span{ width:17px; height:2px; margin:4px 0; background:currentColor; }
        .admin-brand{ display:flex; align-items:center; min-width:0; gap:10px; color:var(--admin-text-primary); text-decoration:none; }
        .admin-brand:hover{ color:var(--admin-primary); }
        .admin-brand img{ width:36px; height:36px; padding:4px; border:1px solid var(--admin-border); border-radius:6px; object-fit:contain; background:var(--admin-surface-muted); }
        .admin-brand-copy{ display:flex; flex-direction:column; min-width:0; line-height:1.15; }
        .admin-brand-copy strong{ overflow:hidden; max-width:220px; color:var(--admin-text-primary); font-size:14px; text-overflow:ellipsis; white-space:nowrap; }
        .admin-brand-copy small{ margin-top:3px; color:var(--admin-text-muted); font-size:11px; }
        .admin-topbar-actions{ display:flex; align-items:center; gap:6px; }
        .admin-topbar-actions>li{ display:flex; align-items:center; }
        .admin-topbar-link{ display:inline-flex !important; align-items:center; min-height:38px; gap:7px; padding:7px 10px !important; border:1px solid var(--admin-border); border-radius:6px; color:var(--admin-text-secondary) !important; background:var(--admin-surface); transition:border-color .18s ease,background-color .18s ease,color .18s ease; }
        .admin-topbar-link:hover,.admin-topbar-link[aria-expanded="true"]{ border-color:var(--admin-primary); color:var(--admin-primary) !important; background:var(--admin-surface-muted); }
        .admin-topbar-link .noti-icon{ margin:0 !important; font-size:19px !important; line-height:1 !important; }
        .admin-topbar-label{ font-size:12px; font-weight:600; }
        .admin-user-link{ padding:5px 8px !important; }
        .admin-user-link .account-user-avatar img{ width:30px; height:30px; border:2px solid var(--admin-primary); object-fit:cover; }
        .admin-user-meta{ display:flex; flex-direction:column; max-width:150px; line-height:1.15; text-align:left; }
        .admin-user-meta strong{ overflow:hidden; color:var(--admin-text-primary); font-size:12px; text-overflow:ellipsis; white-space:nowrap; }
        .admin-user-meta small{ margin-top:2px; color:var(--admin-text-muted); font-size:10px; }
        .admin-user-chevron{ color:var(--admin-text-muted); font-size:16px; }
        .topbar-dropdown-menu{ margin-top:8px !important; border:1px solid var(--admin-border); border-radius:6px; box-shadow:0 12px 28px rgba(23,23,23,.12); }
        .profile-dropdown .dropdown-header{ background:var(--admin-surface-muted); }
        .profile-dropdown .notify-item:hover{ color:var(--admin-primary); background:var(--admin-surface-muted); }
        .leftside-menu.leftside-menu-detached{ background:var(--admin-surface) !important; border-right:1px solid var(--admin-border); }
        .leftside-menu .side-nav-link:hover,
        .leftside-menu .side-nav-link:focus,
        .leftside-menu .side-nav-link.active{ color:var(--admin-primary) !important; background:var(--admin-surface-muted); }
        .leftside-menu .side-nav-link.active i,
        .leftside-menu .side-nav-link:hover i{ color:var(--admin-primary) !important; }
        .leftbar-user-name{ color:var(--admin-text-primary) !important; }
        .card,.modal-content,.dropdown-menu{ border-color:var(--admin-border); background-color:var(--admin-surface); }
        .form-control,.form-select{ border-color:var(--admin-border); color:var(--admin-text-primary); background-color:var(--admin-surface); }
        .form-control:focus,.form-select:focus{ border-color:var(--admin-primary); box-shadow:0 0 0 .15rem rgba(65,18,100,.12); }
        .btn-primary,.bg-primary{ border-color:var(--admin-primary) !important; background-color:var(--admin-primary) !important; color:var(--admin-primary-text) !important; }
        .btn-primary:hover,.btn-primary:focus{ border-color:var(--admin-primary-hover) !important; background-color:var(--admin-primary-hover) !important; }
        .btn-warning,.bg-warning{ border-color:var(--admin-accent) !important; background-color:var(--admin-accent) !important; color:var(--admin-text-primary) !important; }
        .btn-warning:hover,.btn-warning:focus{ border-color:var(--admin-accent-hover) !important; background-color:var(--admin-accent-hover) !important; }
        .text-primary{ color:var(--admin-primary) !important; }
        .border-primary{ border-color:var(--admin-primary) !important; }
        .page-title,.card-title,h1,h2,h3,h4,h5,h6{ color:var(--admin-text-primary); }
        .text-muted{ color:var(--admin-text-muted) !important; }
        .table{ --ct-table-border-color:var(--admin-border); }
        .table-hover>tbody>tr:hover>*{ background-color:var(--admin-surface-muted); }
        .pagination .page-item.active .page-link{ border-color:var(--admin-primary); background:var(--admin-primary); color:var(--admin-primary-text); }

        @media print{ .no-print,.no-print *{ display:none !important; } }

        [data-layout-color="light"] .content-page,
        [data-layout-color="light"] .content-page *{ color:#111; }

        @media (min-width: 992px){
            body.with-sidebar{ padding-left: var(--ls-w); }
        }

        .leftside-menu.leftside-menu-detached{
            min-width: var(--ls-w) !important;
            max-width: var(--ls-w) !important;
        }

        @media (max-width: 991.98px){
            .leftside-menu.leftside-menu-detached{
                position: relative;
                width: 100% !important; min-width: 100% !important; max-width: 100% !important;
                border-right: 0; box-shadow: none;
            }
            body.with-sidebar{ padding-left:0 !important; }
            .admin-brand-copy small{ display:none; }
        }

        @media (max-width: 575.98px){
            .admin-topbar-inner{ min-height:62px; gap:8px; padding-right:10px; padding-left:10px; }
            .admin-brand-copy strong{ max-width:110px; font-size:12px; }
            .admin-topbar-label,.admin-user-meta{ display:none; }
            .admin-topbar-link{ width:38px; justify-content:center; padding:5px !important; }
        }

        .topnav-logo{ display: none !important; }

        .leftbar-user{ text-align:center; padding: 14px 10px; }
        .leftbar-user a{ display:block; text-decoration:none; }
        .sidebar-logo{
            height: 64px; width:auto; display:block; margin: 50px auto 8px;
            object-fit:contain;
        }
        .leftbar-user-name{
            color:#fff; font-weight:600; font-size:15px; margin-top:6px;
            display:block;
        }

        .leftbar-user img.rounded-circle{ width:42px; height:42px; object-fit:cover; }

        .content-page .content{ padding-top: 14px; }
        .content-page{ background:var(--admin-background); }

        .footer{ border-top: 1px solid rgba(0,0,0,.05); }

        /* ✅ arrow/box remove */
        .leftside-menu .side-nav-link.has-arrow::after,
        .leftside-menu .side-nav-link.has-arrow:after,
        .leftside-menu a.side-nav-link.has-arrow::after,
        .leftside-menu button.side-nav-link.has-arrow::after,
        .leftside-menu .side-nav-link[data-bs-toggle="collapse"]::after,
        .leftside-menu .side-nav-link[data-bs-toggle="collapse"]:after,
        .leftside-menu .side-nav-item > a.has-arrow::after,
        .leftside-menu .side-nav-item > button.has-arrow::after{
            content: none !important;
            display: none !important;
            width: 0 !important;
            height: 0 !important;
            border: 0 !important;
            background: transparent !important;
            box-shadow: none !important;
            -webkit-mask: none !important;
            mask: none !important;
        }

        .leftside-menu .side-nav-link.has-arrow{
            background-image: none !important;
        }

        .leftside-menu button.side-nav-link,
        .leftside-menu button.side-nav-link:focus,
        .leftside-menu button.side-nav-link:active{
            outline: none !important;
            box-shadow: none !important;
            border: 0 !important;
            appearance: none !important;
            -webkit-appearance: none !important;
        }
    </style>

    {{-- ✅ Per-page CSS --}}
    @stack('css')
</head>

<body class="loading with-sidebar"
      data-layout="detached"
      data-layout-color="light"
      data-rightbar-onstart="true">

    <!-- Topbar Start -->
    <div class="navbar-custom topnav-navbar topnav-navbar-dark">
        <div class="container-fluid admin-topbar-inner">
            <div class="admin-topbar-start">
                <button type="button" class="button-menu-mobile disable-btn admin-menu-toggle" aria-label="Toggle sidebar" title="Toggle sidebar">
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
                    <a class="nav-link dropdown-toggle nav-user arrow-none me-0 admin-topbar-link admin-user-link" data-bs-toggle="dropdown" id="topbar-userdrop" href="#" role="button">
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
    <!-- end Topbar -->

    <!-- Start Content-->
    <div class="container-fluid">
        <div class="wrapper">

            <!-- ========== Left Sidebar Start ========== -->
            <div class="leftside-menu leftside-menu-detached">
                <div class="leftbar-user">
                    <a href="{{ route('admin.dashboard') }}">
                        <img src="{{ $logoUrl }}" class="sidebar-logo" alt="{{ $info->site_name ?? 'Admin' }} Logo">
                    </a>
                    <span class="leftbar-user-name">{{ auth()->user()->name }}</span>
                </div>

                @include('backend.partials.navbar')

                <div class="clearfix"></div>
            </div>
            <!-- Left Sidebar End -->

            <div class="content-page">
                <div class="content">

                    {{-- ✅ Page Content --}}
                    @yield('content')

                </div>

                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6"></div>
                        </div>
                    </div>
                </footer>
            </div>

        </div>
    </div>
    <!-- END Container -->

    <div class="end-bar">
        <div class="rightbar-title">
            <a href="javascript:void(0);" class="end-bar-toggle float-end">
                <i class="dripicons-cross noti-icon"></i>
            </a>
            <h5 class="m-0 text-light">Settings</h5>
        </div>

        <div class="rightbar-content h-100" data-simplebar>
            <div class="p-3">
                <h5 class="mt-3">Color Scheme</h5>
                <hr class="mt-1" />
                <div class="form-check form-switch mb-1">
                    <input type="checkbox" class="form-check-input" name="color-scheme-mode" value="light" id="light-mode-check" checked />
                    <label class="form-check-label" for="light-mode-check">Light Mode</label>
                </div>
                <div class="form-check form-switch mb-1">
                    <input type="checkbox" class="form-check-input" name="color-scheme-mode" value="dark" id="dark-mode-check" />
                    <label class="form-check-label" for="dark-mode-check">Dark Mode</label>
                </div>

                <h5 class="mt-4">Width</h5>
                <hr class="mt-1" />
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

    {{-- ✅ Base JS --}}
    @include('backend.partials.js')

    {{-- ✅ Per-page JS (important) --}}
    @stack('js')
</body>
</html>
