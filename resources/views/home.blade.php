<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
</head>

<body class="bg-[#d9e6d1] min-h-screen flex flex-col">
    <x-swal />
    @include('components.navbar')
    <main class="flex-grow px-6 py-6 max-w-4xl mx-auto w-full">
    <section
    class="border border-gray-400 rounded-md p-4 mb-6 bg-white text-gray-900 text-sm sm:text-base leading-relaxed overflow-y-auto"
    style="max-height: 300px;"> 
    
    <p class="mt-6">
        <strong>
            Air New Zealand’s journey toward a sustainable future has been turbulent, and there’s more rough air
            ahead.
        </strong>
    </p>
    <p class="mt-2">
        The airline’s journey toward an energy-saving future has been turbulent, and there’s more rough air
        ahead. “We’re doing everything we can,” says the airline’s chief sustainability officer. Here’s how.
    </p>
    <p class="mt-8">
        <strong>
            FACT SHEET: Climate change and heat waves
        </strong>
    </p>
    <p class="mt-2 mb-6">
        Climate change, primarily from the burning of fossil fuels, is causing more frequent and intense heat
        waves (ClimateData.ca 2024). These heat waves are threatening the safety, well-being, and prosperity of
        Canadians…
    </p>

    <p class="mt-8">
        <strong>
            Solar mats installed on waste and recycling trucks
        </strong>
    </p>
    <p class="mt-2">
        Solar mats have been installed on 20 refuse and recycling trucks across the Warwick district. The technology had been installed in a bid to reduce energy consumption, and it could reduce carbon emissions by about 1.3 tonnes per vehicle per year, Warwick District Council said.
    </p>

    <p class="mt-8">
        <strong>
            Fast fashion fuelling global waste crisis, UN chief warns
        </strong>
    </p>
    <p class="mt-2 mb-6">
        Speaking at an event commemorating Sunday’s International Day of Zero Waste, Secretary-General António Guterres called for urgent action to curb the textile industry’s devastating impact on the planet. “Dressing to kill could kill the planet,” he stressed.
    </p>

</section>
        <h2 class="font-bold text-sm sm:text-base mb-4">
            KERAJINAN DAUR ULANG SAMPAH
        </h2>
        <div class="flex justify-between space-x-4 mb-6">
            <img alt="Recycled pen holder craft made from black and red containers with white polka dots, holding pens and pencils"
                class="rounded-lg object-cover w-1/3" height="100"
                src="https://storage.googleapis.com/a1aa/image/82f3f340-9f5f-4aba-f11d-aaf17d0f7a56.jpg" width="120" />
            <img alt="Rainbow colored egg carton craft with star decorations and a rainbow flag"
                class="rounded-lg object-cover w-1/3" height="100"
                src="https://storage.googleapis.com/a1aa/image/410d3eaa-f787-4597-e61e-4facca7f8fb1.jpg" width="120" />
            <img alt="Plant holder craft made from red plastic cups arranged in a circle with a green plant growing inside"
                class="rounded-lg object-cover w-1/3" height="100"
                src="https://storage.googleapis.com/a1aa/image/58426b5a-8216-4f61-c741-69853c73ec0c.jpg" width="120" />
        </div>
        <div class="flex justify-center">
            <button
                class="bg-[#4a6a3a] text-white text-sm sm:text-base rounded-full px-6 py-2 hover:bg-[#3e5a2f] transition-colors"
                type="button">
                Load More
            </button>
        </div>
    </main>
</body>

</html>