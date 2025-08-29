<div class="flex items-center justify-between w-full mb-6">
    <h4 class="text-xl font-medium">
        {{ $title }}
    </h4>

    <ol aria-label="Breadcrumb" class="hidden md:flex items-center whitespace-nowrap min-w-0 gap-2">
        <li class="text-sm">
            <a class="flex items-center gap-2 align-middle text-default-800 transition-all leading-none hover:text-primary-500" href="javascript:void(0)">
                {{ $subtitle }}
                <i class="w-4 h-4" data-lucide="chevron-right"></i>
            </a>
        </li>

        <li aria-current="page" class="text-sm font-medium text-primary truncate leading-none hover:text-primary-500">
            {{ $title }}
        </li>
    </ol>
</div>