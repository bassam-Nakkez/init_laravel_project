<?php

namespace Database\Factories;

use App\Http\Models\Company;
use App\Http\Models\CompanyImage;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyImagesFactory extends Factory
{

    protected $model = CompanyImage::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
       
        $image = [
            'https://t4.ftcdn.net/jpg/02/69/47/51/360_F_269475198_k41qahrZ1j4RK1sarncMiFHpcmE2qllQ.jpg',
            'https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8YnVzfGVufDB8fDB8fHww',
            'https://www.setra-bus.com/content/dam/sbo/markets/common/models/cc-hd-models/images/teaser/EB29590-CC-HD-teaser-home-01.jpg' ,
            'https://www.lectura-specs.com/models/renamed/orig/touring-coaches-topclass-s-516-hdh-setra.jpg',
            'https://www.setra-bus.com/content/dam/sbo/markets/ro_RO/brand/setraworld-magazine/images/teaser/setra-reveal-final-01-en.jpg',
            'https://cdn.pixabay.com/video/2022/12/13/142755-780943401_tiny.jpg',
            'https://thumbs.dreamstime.com/b/ho-chi-minh-city-vietnam-july-public-transportation-interior-modern-bus-158918793.jpg',
            'https://img.freepik.com/premium-photo/night-bus-free-photo-hd-8k-wallpaper_915071-92097.jpg',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSccunrBukCF20-M8AwOu_04XD095Tbel1jfWpsBT1gCjyPk2S6cbJiM_-Fpg4dQ_CysE4&usqp=CAU',
            'https://static.vecteezy.com/system/resources/previews/040/533/959/non_2x/ai-generated-classic-red-double-decker-bus-drives-through-bustling-london-streets-in-closeup-free-photo.jpg',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQyw1l0l9zI_7COjcxgE7rFSp03IDHCqBsE0yiOXJBDIg&s',
            'https://static.vecteezy.com/system/resources/previews/029/549/193/non_2x/bus-on-the-road-at-night-with-motion-blur-effect-abstract-background-ai-generated-pro-photo.jpg',
            'https://img.freepik.com/premium-photo/bus-is-moving-along-city-street-with-long-exposures-lights-bus-building_183983-113.jpg',
            'https://img.freepik.com/premium-photo/bus-driving-down-street-tall-building-with-clock-it-generative-ai_97167-3734.jpg',
            'https://static.vecteezy.com/system/resources/previews/030/710/241/non_2x/close-up-of-school-bus-on-the-road-generative-ai-free-photo.jpg',
            'https://t4.ftcdn.net/jpg/06/30/73/39/360_F_630733972_IK5Yel9n8nFadX40938yDbQnzAQZsoJU.jpg',
            'https://static.vecteezy.com/system/resources/thumbnails/026/978/918/small_2x/motorhome-of-a-beautiful-transportation-with-futuristic-design-ai-generated-photo.jpg',
            'https://us.123rf.com/450wm/visoot/visoot2306/visoot230602589/207333244-bus-luxury-vip-first-class-for-travel-vacation-tourism-the-coach-modern-bus.jpg',
            'https://us.123rf.com/450wm/visoot/visoot2306/visoot230602588/207333183-bus-luxury-vip-first-class-travel-vacation-tourism-tour-public-route-modern-art-design-vector.jpg',
            'https://thumbs.dreamstime.com/b/un-bus-luxueux-et-spacieux-au-design-futuriste-qui-conduit-sur-une-route-de-montagne-concept-transport-urbain-confortable-haut-272786230.jpg',
            'https://static.vecteezy.com/system/resources/thumbnails/023/059/977/small_2x/futuristic-bus-on-the-road-ai-generated-free-photo.jpg',
            'https://static.vecteezy.com/system/resources/thumbnails/023/059/977/small_2x/futuristic-bus-on-the-road-ai-generated-free-photo.jpg',
    
             ];
            return [
                "companyId" => $this->faker->randomElement(Company::pluck('companyId')),
                "image"     => $image[$this->faker->numberBetween(0,21)],
            ];
    }
}
