<div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
    <!--<x-application-logo class="block h-12 w-auto" />-->

    <h1 class="mt-8 text-2xl font-medium text-gray-900 dark:text-white">
        Welcome to GenGaku
    </h1>

    <p class="mt-6 text-gray-500 dark:text-gray-400 leading-relaxed">
        --Bevezető szöveg--
    </p>
</div>

<div class="bg-gray-200 dark:bg-gray-800 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
    <div>
        <div class="flex items-center">
            <h2 class="ml-3 text-xl font-semibold text-gray-900 dark:text-white">
                <a>Ismertető 1</a>
            </h2>
        </div>

        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
            --szöveg--
        </p>

        <p class="mt-4 text-sm">
            <a href="{{ route('courses/maincourse.start') }}" :active="request()->routeIs('courses/maincourse.start')" class="inline-flex items-center font-semibold text-indigo-700 dark:text-indigo-300">
                Main course

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="ml-1 w-5 h-5 fill-indigo-500 dark:fill-indigo-200">
                    <path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd" />
                </svg>
            </a>
        </p>
    </div>

    <div>
        <div class="flex items-center">
            <h2 class="ml-3 text-xl font-semibold text-gray-900 dark:text-white">
                <a>Ismertető 2</a>
            </h2>
        </div>

        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
            --szöveg--
        </p>

        <p class="mt-4 text-sm">
            <a href="{{ route('courses/writingcourse.start') }}" :active="request()->routeIs('courses/maincourse.start')" class="inline-flex items-center font-semibold text-indigo-700 dark:text-indigo-300">
                Writing course

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="ml-1 w-5 h-5 fill-indigo-500 dark:fill-indigo-200">
                    <path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd" />
                </svg>
            </a>
        </p>
    </div>

    <div>
        <div class="flex items-center">
            <h2 class="ml-3 text-xl font-semibold text-gray-900 dark:text-white">
                <a>Ismertető 3</a>
            </h2>
        </div>

        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
            --szöveg--
        </p>
    </div>

    <div>
        <div class="flex items-center">
            <h2 class="ml-3 text-xl font-semibold text-gray-900 dark:text-white">
                <a>Ismertető 4</a>
            </h2>
        </div>

        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
            --szöveg--
        </p>
    </div>
</div>
