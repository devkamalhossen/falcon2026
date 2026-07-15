<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.dashboard') ? ' active' : 'collapsed' }}"
                href="{{ route('admin.dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        @php
            $isPageActive = request()->routeIs('page.*') ? 'show' : '';
        @endphp
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#pages-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i>
                <span>Pages</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="pages-nav" class="nav-content collapse {{ $isPageActive }}" data-bs-parent="#sidebar-nav">
                <li>
                    <a class="{{ request()->routeIs('page.index') ? 'active' : '' }}" href="{{ route('page.index') }}">
                        <i class="bi bi-circle"></i><span>Manage Page</span>
                    </a>
                </li>
                <li>
                    <a class="{{ request()->routeIs('page.our.story') ? 'active' : '' }}"
                        href="{{ route('page.our.story') }}">
                        <i class="bi bi-circle"></i><span>Our Story</span>
                    </a>
                </li>
                <li>
                    <a class="{{ request()->routeIs('page.our.business') ? 'active' : '' }}"
                        href="{{ route('page.our.business') }}">
                        <i class="bi bi-circle"></i><span>Our Business</span>
                    </a>
                </li>

                <li>
                    <a class="{{ request()->routeIs('page.client') ? 'active' : '' }}"
                        href="{{ route('page.client') }}">
                        <i class="bi bi-circle"></i><span>Client</span>
                    </a>
                </li>
                   <li>
                    <a class="{{ request()->routeIs('page.certificate') ? 'active' : '' }}"
                        href="{{ route('page.certificate') }}">
                        <i class="bi bi-circle"></i><span>Certification</span>
                    </a>
                </li>
                <li>
                    <a class="{{ request()->routeIs('page.team') ? 'active' : '' }}" href="{{ route('page.team') }}">
                        <i class="bi bi-circle"></i><span>Team</span>
                    </a>
                </li>
                <li>
                    <a class="{{ request()->routeIs('page.why.choose') ? 'active' : '' }}"
                        href="{{ route('page.why.choose') }}">
                        <i class="bi bi-circle"></i><span>Why Choose</span>
                    </a>
                </li>
                <li>
                    <a class="{{ request()->routeIs('page.service.area') ? 'active' : '' }}"
                        href="{{ route('page.service.area') }}">
                        <i class="bi bi-circle"></i><span>Service Area</span>
                    </a>
                </li>
                <li>
                    <a class="{{ request()->routeIs('page.service') ? 'active' : '' }}"
                        href="{{ route('page.service') }}">
                        <i class="bi bi-circle"></i><span>Service</span>
                    </a>
                </li>
                <li>
                    <a class="{{ request()->routeIs('page.contact') ? 'active' : '' }}"
                        href="{{ route('page.contact') }}">
                        <i class="bi bi-circle"></i><span>Contact</span>
                    </a>
                </li>

            </ul>
        </li>
        @php
            $isPageActive = request()->routeIs('category.*', 'blog.*') ? 'show' : '';
        @endphp
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#blog-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-pencil-square"></i><span>Blog</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="blog-nav" class="nav-content collapse {{ $isPageActive }}" data-bs-parent="#sidebar-nav">

                <li>
                    <a class="{{ request()->routeIs('category.*') ? 'active' : '' }}"
                        href="{{ route('category.index') }}">
                        <i class="bi bi-circle"></i><span>Category</span>
                    </a>
                </li>
                <li>
                    <a class="{{ request()->routeIs('blog.*') ? 'active' : '' }}" href="{{ route('blog.index') }}">
                        <i class="bi bi-circle"></i><span>Blog</span>
                    </a>
                </li>


            </ul>
        </li>
        @php
            $isPageActive = request()->routeIs('product-category.*', 'product.*') ? 'show' : '';
        @endphp
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#productCategory-nav" data-bs-toggle="collapse"
                href="#">
                <i class="bi bi-basket"></i><span>Product</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="productCategory-nav" class="nav-content collapse {{ $isPageActive }}"
                data-bs-parent="#sidebar-nav">

                <li>
                    <a class="{{ request()->routeIs('product-category.*') ? 'active' : '' }}"
                        href="{{ route('product-category.index') }}">
                        <i class="bi bi-circle"></i><span>Category</span>
                    </a>
                </li>
                <li>
                    <a class="{{ request()->routeIs('product.*') ? 'active' : '' }}"
                        href="{{ route('product.index') }}">
                        <i class="bi bi-circle"></i><span>Product</span>
                    </a>
                </li>


            </ul>
        </li>
        @php
            $isServicePageActive = request()->routeIs(
                'service-category.*',
                'service.*',
                'feature.*',
                'benefit.*',
                'gallery.*',
                'faq.*',
                'description.*',
            )
                ? 'show'
                : '';
        @endphp
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#ServiceCategory-nav" data-bs-toggle="collapse"
                href="#">
                <i class="bi bi-tools"></i><span>Service</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="ServiceCategory-nav" class="nav-content collapse {{ $isServicePageActive }}"
                data-bs-parent="#sidebar-nav">

                <li>
                    <a class="{{ request()->routeIs('service-category.*') ? 'active' : '' }}"
                        href="{{ route('service-category.index') }}">
                        <i class="bi bi-circle"></i><span>Category</span>
                    </a>
                </li>
                <li>
                    <a class="{{ request()->routeIs('service.*') ? 'active' : '' }}"
                        href="{{ route('service.index') }}">
                        <i class="bi bi-circle"></i><span>Services</span>
                    </a>
                </li>
            </ul>
        </li>
        @php
            $isBusinessPageActive = request()->routeIs('business-category.*', 'business.*') ? 'show' : '';
        @endphp
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#Business-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-tools"></i><span>Business</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="Business-nav" class="nav-content collapse {{ $isBusinessPageActive }}"
                data-bs-parent="#sidebar-nav">

                <li>
                    <a class="{{ request()->routeIs('business-category.*') ? 'active' : '' }}"
                        href="{{ route('business-category.index') }}">
                        <i class="bi bi-circle"></i><span>Category</span>
                    </a>
                </li>
                <li>
                    <a class="{{ request()->routeIs('business.*') ? 'active' : '' }}"
                        href="{{ route('business.index') }}">
                        <i class="bi bi-circle"></i><span>Business</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('project.*') ? ' active' : 'collapsed' }}"
                href="{{ route('project.index') }}">
                <i class="bi bi-kanban"></i>
                <span>Project</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('customer.message') ? ' active' : 'collapsed' }}"
                href="{{ route('customer.message') }}">
                <i class="bi bi-person-lines-fill"></i>
                <span>Contact Leads</span>
            </a>
        </li>
        @php
            $isActive = request()->routeIs(
                'about.content',
                'achievement.content',
                'achievement.index',
                'slider.*',
                'banner.*',
                'service-area.*',
                'team.*',
                'team-type.*',
                'client.*',
                'company-file.*',
                'why-choose-us.*',
                'importer.*',
                'social.*',
                'location.*',
                'galleries.*',
                'gallery-category.*',
                'google-review.*',
                'certificate-badge.*',
                'home.intro',
                'home.category.intro',
                'vision.*',
                'core-value.*',
                'founder-message.*',
                'certification.*'
            )
                ? 'show'
                : '';
        @endphp
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#cms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window"></i><span>Content Manage</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="cms-nav" class="nav-content collapse {{ $isActive }}" data-bs-parent="#sidebar-nav">

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home.intro') ? 'active' : 'collapsed' }}"
                        href="{{ route('home.intro') }}">
                        <i class="bi bi-grid"></i>
                        <span>Home Intro</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home.category.intro') ? 'active' : 'collapsed' }}"
                        href="{{ route('home.category.intro') }}">
                        <i class="bi bi-grid"></i>
                        <span>Home Category Intro</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('certificate-badge.index') ? 'active' : 'collapsed' }}"
                        href="{{ route('certificate-badge.index') }}">
                        <i class="bi bi-grid"></i>
                        <span>Certificate Badges</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('about.content') ? 'active' : 'collapsed' }}"
                        href="{{ route('about.content') }}">
                        <i class="bi bi-grid"></i>
                        <span>About</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('achievement.content') ? 'active' : 'collapsed' }}"
                        href="{{ route('achievement.content') }}">
                        <i class="bi bi-grid"></i>
                        <span>Achievement Content</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('achievement.index') ? 'active' : 'collapsed' }}"
                        href="{{ route('achievement.index') }}">
                        <i class="bi bi-grid"></i>
                        <span>Achievement</span>
                    </a>
                </li>
                   <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('slider.index') ? 'active' : 'collapsed' }}"
                        href="{{ route('slider.index') }}">
                        <i class="bi bi-grid"></i>
                        <span>Achievement Slider</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('banner.*') ? 'active' : 'collapsed' }}"
                        href="{{ route('banner.index') }}">
                        <i class="bi bi-grid"></i>
                        <span>Banner Slider</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('service-area.*') ? 'active' : 'collapsed' }}"
                        href="{{ route('service-area.index') }}">
                        <i class="bi bi-grid"></i>
                        <span>Service Area</span>
                    </a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('team-type.*') ? 'active' : 'collapsed' }}"
                        href="{{ route('team-type.index') }}">
                        <i class="bi bi-grid"></i>
                        <span>Team Type</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('team.*') ? 'active' : 'collapsed' }}"
                        href="{{ route('team.index') }}">
                        <i class="bi bi-grid"></i>
                        <span>Teams</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('client.*') ? 'active' : 'collapsed' }}"
                        href="{{ route('client.index') }}">
                        <i class="bi bi-grid"></i>
                        <span>Clients</span>
                    </a>
                </li>
                    <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('certification.*') ? 'active' : 'collapsed' }}"
                        href="{{ route('certification.index') }}">
                        <i class="bi bi-grid"></i>
                        <span>Certifications</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('company-file.*') ? 'active' : 'collapsed' }}"
                        href="{{ route('company-file.index') }}">
                        <i class="bi bi-grid"></i>
                        <span>Company Files</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('why-choose-us.*') ? 'active' : 'collapsed' }}"
                        href="{{ route('why-choose-us.index') }}">
                        <i class="bi bi-grid"></i>
                        <span>Why Choose Us</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('importer.*') ? 'active' : 'collapsed' }}"
                        href="{{ route('importer.index') }}">
                        <i class="bi bi-grid"></i>
                        <span>Importer</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('social.*') ? 'active' : 'collapsed' }}"
                        href="{{ route('social.index') }}">
                        <i class="bi bi-grid"></i>
                        <span>Social Medias</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('location.*') ? 'active' : 'collapsed' }}"
                        href="{{ route('location.index') }}">
                        <i class="bi bi-grid"></i>
                        <span>Branch</span>
                    </a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('gallery-category.*') ? 'active' : 'collapsed' }}"
                        href="{{ route('gallery-category.index') }}">
                        <i class="bi bi-grid"></i>
                        <span>Gallery Category</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('galleries.*') ? 'active' : 'collapsed' }}"
                        href="{{ route('galleries.index') }}">
                        <i class="bi bi-grid"></i>
                        <span>Gallery</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('google-review.index') ? 'active' : 'collapsed' }}"
                        href="{{ route('google-review.index') }}">
                        <i class="bi bi-grid"></i>
                        <span>Google Reviews</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('vision.index') ? 'active' : 'collapsed' }}"
                        href="{{ route('vision.index') }}">
                        <i class="bi bi-grid"></i>
                        <span>Vision Mission</span>
                    </a>
                </li>

                 <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('core-value.index') ? 'active' : 'collapsed' }}"
                        href="{{ route('core-value.index') }}">
                        <i class="bi bi-grid"></i>
                        <span>Core Value</span>
                    </a>
                </li>
                  <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('founder-message.index') ? 'active' : 'collapsed' }}"
                        href="{{ route('founder-message.index') }}">
                        <i class="bi bi-grid"></i>
                        <span>Founder Message</span>
                    </a>
                </li>

            </ul>
        </li>
        @php
            $isActive = request()->routeIs('setting.*', 'user.*', 'system.*') ? 'show' : '';
        @endphp
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#setting-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-gear"></i><span>Setting</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="setting-nav" class="nav-content collapse {{ $isActive }}" data-bs-parent="#sidebar-nav">

                <li>
                    <a class="{{ request()->routeIs('setting.general.info') ? 'active' : '' }}"
                        href="{{ route('setting.general.info') }}">
                        <i class="bi bi-circle"></i><span>General</span>
                    </a>
                </li>
                <li>
                    <a class="{{ request()->routeIs('setting.general.meta') ? 'active' : '' }}"
                        href="{{ route('setting.general.meta') }}">
                        <i class="bi bi-circle"></i><span>Meta & SEO</span>
                    </a>
                </li>
                <li>
                    <a class="{{ request()->routeIs('setting.general.mail') ? 'active' : '' }}"
                        href="{{ route('setting.general.mail') }}">
                        <i class="bi bi-circle"></i><span>Mail</span>
                    </a>
                </li>
                <li>
                    <a class="{{ request()->routeIs('setting.general.fb') ? 'active' : '' }}"
                        href="{{ route('setting.general.fb') }}">
                        <i class="bi bi-circle"></i><span>Facebook Pixel</span>
                    </a>
                </li>
                <li>
                    <a class="{{ request()->routeIs('setting.general.google') ? 'active' : '' }}"
                        href="{{ route('setting.general.google') }}">
                        <i class="bi bi-circle"></i><span>Google Scripts</span>
                    </a>
                </li>
            </ul>
        </li>

        @php
            $isActive = request()->routeIs('role.*', 'user.*', 'system.*') ? 'show' : '';
        @endphp
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#system-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-cpu"></i><span>System</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="system-nav" class="nav-content collapse {{ $isActive }}" data-bs-parent="#sidebar-nav">

                <li>
                    <a class="{{ request()->routeIs('role.*') ? 'active' : '' }}" href="{{ route('role.index') }}">
                        <i class="bi bi-circle"></i><span>Role Permissions</span>
                    </a>
                </li>
                <li>
                    <a class="{{ request()->routeIs('user.*') ? 'active' : '' }}" href="{{ route('user.index') }}">
                        <i class="bi bi-circle"></i><span>User Management</span>
                    </a>
                </li>
                <li>
                    <a class="{{ request()->routeIs('system.info') ? 'active' : '' }}"
                        href="{{ route('system.info') }}">
                        <i class="bi bi-circle"></i><span>Information</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>

</aside>
