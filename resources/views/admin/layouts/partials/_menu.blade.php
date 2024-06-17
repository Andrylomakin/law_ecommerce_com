<nav class="navbar navbar-light navbar-vertical navbar-expand-xl">
    <script>
        var navbarStyle = localStorage.getItem("navbarStyle");
        if (navbarStyle && navbarStyle !== 'transparent') {
            document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
        }
    </script>
    <div class="d-flex align-items-center">
        <div class="toggle-icon-wrapper">

            <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>

        </div><a class="navbar-brand" href="/admin">
            <div class="d-flex align-items-center py-3">
                <span class="font-sans-serif">
                    Admin
                </span>
            </div>
        </a>
    </div>
    <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
        <div class="navbar-vertical-content scrollbar">
            <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">

                <a class="nav-link" href="{{ route('admin.service.list') }}" role="button">
                    <div class="d-flex align-items-center">
                        <span class="nav-link-icon">
                            <span class="fas fa-tags"></span>
                        </span>
                        <span class="nav-link-text ps-1">
                            Услуги
                        </span>
                    </div>
                </a>

                <a class="nav-link" href="{{ route('admin.service.category.list') }}" role="button">
                    <div class="d-flex align-items-center">
                        <span class="nav-link-icon">
                            <span class="fas fa-tags"></span>
                        </span>
                        <span class="nav-link-text ps-1">
                            Категории
                        </span>
                    </div>
                </a>

                <a class="nav-link" href="{{ route('admin.seo.lading') }}" role="button">
                    <div class="d-flex align-items-center">
                        <span class="nav-link-icon">
                            <span class="fas fa-tags"></span>
                        </span>
                        <span class="nav-link-text ps-1">
                            SEO Главная
                        </span>
                    </div>
                </a>
                <a class="nav-link" href="{{ route('admin.seo.contact') }}" role="button">
                    <div class="d-flex align-items-center">
                        <span class="nav-link-icon">
                            <span class="fas fa-tags"></span>
                        </span>
                        <span class="nav-link-text ps-1">
                            SEO Контакты
                        </span>
                    </div>
                </a>

                <a class="nav-link" href="{{ route('admin.appraisal.list') }}" role="button">
                    <div class="d-flex align-items-center">
                        <span class="nav-link-icon">
                            <span class="fas fa-tags"></span>
                        </span>
                        <span class="nav-link-text ps-1">
                            Отзывы
                        </span>
                    </div>
                </a>

                <a class="nav-link" href="{{ route('admin.setting.index') }}" role="button">
                    <div class="d-flex align-items-center">
                        <span class="nav-link-icon">
                            <span class="fas fa-tags"></span>
                        </span>
                        <span class="nav-link-text ps-1">
                            Настройки
                        </span>
                    </div>
                </a>

                <a class="nav-link" href="{{ route('admin.template.localization.index') }}" role="button">
                    <div class="d-flex align-items-center">
                        <span class="nav-link-icon">
                            <span class="fas fa-tags"></span>
                        </span>
                        <span class="nav-link-text ps-1">
                            Перевод шаблона
                        </span>
                    </div>
                </a>
            </ul>
        </div>
    </div>
</nav>
