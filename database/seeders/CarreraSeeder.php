<?php

namespace Database\Seeders;

use App\Models\Carrera;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarreraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $carreras = json_decode(
        '[
            {
              "Carrera": "Licenciatura en Arquitectura",
              "Facultad(es)": "CUAAD, CUCOSTA, CUTONALA"
            },
            {
              "Carrera": "Licenciatura en Artes escénicas para la Expresión Dancística",
              "Facultad(es)": "CUAAD"
            },
            {
              "Carrera": "Licenciatura en Artes escénicas para la Expresión Teatral",
              "Facultad(es)": "CUAAD"
            },
            {
              "Carrera": "Licenciatura en Artes visuales para la Expresión Fotográfica",
              "Facultad(es)": "CUAAD, CUCOSTA"
            },
            {
              "Carrera": "Licenciatura en Artes visuales para la Expresión Plástica",
              "Facultad(es)": "CUAAD, CUCOSTA"
            },
            {
              "Carrera": "Licenciatura en Diseño de Interiores y Ambientación",
              "Facultad(es)": "CUAAD"
            },
            {
              "Carrera": "Licenciatura en Diseño Industrial",
              "Facultad(es)": "CUAAD"
            },
            {
              "Carrera": "Diseño para la Comunicación Grafica",
              "Facultad(es)": "CUAAD, CUCOSTA"
            },
            {
              "Carrera": "Licenciatura en Ingeniería en Comunicación Multimedia",
              "Facultad(es)": "CUCOSTA"
            },
            {
              "Carrera": "Licenciatura en Música",
              "Facultad(es)": "CUAAD"
            },
            {
              "Carrera": "Licenciatura en Urbanística y Medio Ambiente",
              "Facultad(es)": "CUAAD"
            },
            {
              "Carrera": "Licenciatura en Diseño de Modas",
              "Facultad(es)": "CUAAD"
            },
            {
              "Carrera": "Licenciatura en Diseño de Artesanías",
              "Facultad(es)": "CUTONALA"
            },
            {
              "Carrera": "Licenciatura en Historia del Arte",
              "Facultad(es)": "CUTONALA"
            },
            {
              "Carrera": "Licenciatura en Agrobiotecnología",
              "Facultad(es)": "CUSUR, CUSI"
            },
            {
              "Carrera": "Licenciatura en Agronegocios",
              "Facultad(es)": "CUSUR, CUVALLES, CUCBA"
            },
            {
              "Carrera": "Licenciatura en Biología",
              "Facultad(es)": "CUCBA, CUCOSTA"
            },
            {
              "Carrera": "Licenciatura en Biología Marina",
              "Facultad(es)": "CUSUR"
            },
            {
              "Carrera": "Licenciatura en Ciencia de los Alimentos",
              "Facultad(es)": "CUCBA"
            },
            {
              "Carrera": "Licenciatura en Ingeniería Agroindustrial",
              "Facultad(es)": "CUALTOS"
            },
            {
              "Carrera": "Licenciatura en Ingeniería en Recursos Naturales y Agropecuarios",
              "Facultad(es)": "CUCSUR"
            },
            {
              "Carrera": "Licenciatura en Ingeniería en Sistemas Pecuarios",
              "Facultad(es)": "CUALTOS, CUCSUR"
            },
            {
              "Carrera": "Licenciatura en Ingeniero Agrónomo",
              "Facultad(es)": "CUCBA, CUCSUR"
            },
            {
              "Carrera": "Licenciatura en Medicina Veterinaria y Zootecnia",
              "Facultad(es)": "CUSUR, CUALTOS, CUCBA"
            },
            {
              "Carrera": "Licenciatura en Ingeniería en Alimentos y Biotecnología",
              "Facultad(es)": "CUCEI"
            },
            {
              "Carrera": "Licenciatura en Administración",
              "Facultad(es)": "CUCOSTA, CUCSUR, CULAGOS, CUTONALA, CUVALLES, SUV"
            },
            {
              "Carrera": "Licenciatura en Administración de las Organizaciones",
              "Facultad(es)": "SUV"
            },
            {
              "Carrera": "Licenciatura en Administración Financiera y Sistemas",
              "Facultad(es)": "CUCEA, CUSUR"
            },
            {
              "Carrera": "Licenciatura en Administración Gubernamental y Políticas Públicas Locales",
              "Facultad(es)": "CUCEA"
            },
            {
              "Carrera": "Licenciatura en Contaduría Pública",
              "Facultad(es)": "CUALTOS, CUCEA, CUCSUR, CUNORTE, CUTONALA, CUVALLES"
            },
            {
              "Carrera": "Licenciatura en Economía",
              "Facultad(es)": "CUCEA"
            },
            {
              "Carrera": "Licenciatura en Mercadotecnia",
              "Facultad(es)": "CUCEA"
            },
            {
              "Carrera": "Licenciatura en Negocios Internacionales",
              "Facultad(es)": "CUCEA, CUSUR"
            },
            {
              "Carrera": "Licenciatura en Recursos Humanos",
              "Facultad(es)": "CUCEA"
            },
            {
              "Carrera": "Licenciatura en Turismo",
              "Facultad(es)": "CUCEA, CUCOSTA, CUSUR, CUNORTE, CUVALLES"
            },
            {
              "Carrera": "Licenciatura en Gestión y Economía Ambiental",
              "Facultad(es)": "CUCEA"
            },
            {
              "Carrera": "Licenciatura en Desarrollo Turístico Sustentable",
              "Facultad(es)": "CUSUR"
            },
            {
              "Carrera": "Licenciatura en Administración de Negocios",
              "Facultad(es)": "CUTONALA"
            },
            {
              "Carrera": "Licenciatura en Física",
              "Facultad(es)": "CUCEI"
            },
            {
              "Carrera": "Licenciatura en Ingeniería Biomédica",
              "Facultad(es)": "CUCEI"
            },
            {
              "Carrera": "Licenciatura en Ingeniería Bioquímica",
              "Facultad(es)": "CULAGOS"
            },
            {
              "Carrera": "Licenciatura en Ingeniería Civil",
              "Facultad(es)": "CUCOSTA"
            },
            {
              "Carrera": "Licenciatura en Ingeniería en Administración Industrial",
              "Facultad(es)": "CULAGOS"
            },
            {
              "Carrera": "Licenciatura en Ingeniería en Computación",
              "Facultad(es)": "CULAGOS, CUNORTE, CUTONALA, CUVALLES"
            },
            {
              "Carrera": "Licenciatura en Ingeniería Comunicaciones y Electrónica",
              "Facultad(es)": "CUCEI"
            },
            {
              "Carrera": "Licenciatura en Ingeniería en Electrónica y Computación",
              "Facultad(es)": "CULAGOS, CUNORTE, CUVALLES"
            },
            {
              "Carrera": "Licenciatura en Ingeniería en Obras y Servicios",
              "Facultad(es)": "CUCSUR"
            },
            {
              "Carrera": "Licenciatura en Ingeniería de Procesos y Comercio Internacional",
              "Facultad(es)": "CUCSUR"
            },
            {
              "Carrera": "Licenciatura en Ingeniería en Telemática",
              "Facultad(es)": "CUSUR, CUCOSTA"
            },
            {
              "Carrera": "Licenciatura en Ingeniería Industrial",
              "Facultad(es)": "CUCEI, CULAGOS"
            },
            {
              "Carrera": "Licenciatura en Ingeniería Mecánica Eléctrica",
              "Facultad(es)": "CUCEI, CULAGOS, CUNORTE"
            },
            {
              "Carrera": "Licenciatura en Ingeniería Mecatrónica",
              "Facultad(es)": "CUCSUR, CULAGOS, CUVALLES"
            },
            {
              "Carrera": "Licenciatura en Ingeniería Química",
              "Facultad(es)": "CUCEI"
            },
            {
              "Carrera": "Licenciatura en Matemáticas",
              "Facultad(es)": "CUCEI"
            },
            {
              "Carrera": "Licenciatura en Química",
              "Facultad(es)": "CUCEI"
            },
            {
              "Carrera": "Licenciatura en Químico Farmacobiólogo",
              "Facultad(es)": "CUCEI"
            },
            {
              "Carrera": "Licenciatura en Tecnologías e Información",
              "Facultad(es)": "CULAGOS, CUVALLES, SUV"
            },
            {
              "Carrera": "Licenciatura en Ingeniería en Nanotecnología",
              "Facultad(es)": "CUTONALA"
            },
            {
              "Carrera": "Licenciatura en Ingeniería en Ciencias Computacionales",
              "Facultad(es)": "CUTONALA"
            },
            {
              "Carrera": "Licenciatura en Ingeniería en Energía",
              "Facultad(es)": "CUTONALA"
            },
            {
              "Carrera": "Licenciatura en Cirujano Dentista",
              "Facultad(es)": "CUALTOS, CUCS"
            },
            {
              "Carrera": "Licenciatura en Cultura Física y Deportes",
              "Facultad(es)": "CUCS, CUCOSTA"
            },
            {
              "Carrera": "Carrera de Enfermería",
              "Facultad(es)": "CUCS, CUSUR"
            },
            {
              "Carrera": "Licenciatura en Enfermería",
              "Facultad(es)": "CUALTOS, CUCOSTA, CUCS, CUCSUR, CUNORTE"
            },
            {
              "Carrera": "Carrera de Médico Cirujano y Partero",
              "Facultad(es)": "CUCS, CUCOSTA, CUSUR, CUALTOS, CUTONALA"
            },
            {
              "Carrera": "Licenciatura en Nutrición",
              "Facultad(es)": "CUCOSTA, CUCS, CUSUR, CUNORTE, CUVALLES, CUTONALA"
            },
            {
              "Carrera": "Licenciatura en Psicología",
              "Facultad(es)": "CUALTOS, CUCOSTA, CUCS, CULAGOS, CUVALLES, CUNORTE, CUSUR"
            },
            {
              "Carrera": "Licenciatura en Seguridad Laboral, Protección Civil y Emergencias",
              "Facultad(es)": "CUCS, CUSUR"
            },
            {
              "Carrera": "Licenciatura en Gerontología",
              "Facultad(es)": "CUTONALA"
            },
            {
              "Carrera": "Licenciatura en Salud Publica",
              "Facultad(es)": "CUTONALA"
            },
            {
              "Carrera": "Licenciatura en Antropología",
              "Facultad(es)": "CUNORTE, CUCSH"
            },
            {
              "Carrera": "Licenciatura en Bibliotecología y Gestión del Conocimiento",
              "Facultad(es)": "SUV"
            },
            {
              "Carrera": "Licenciatura en Derecho o Abogado",
              "Facultad(es)": "CUCOSTA, CUCSUR, CULAGOS, CUTONALA, CUVALLES, CUALTOS, CUCSH, CUSUR"
            },
            {
              "Carrera": "Licenciatura en Didáctica del Frances como Lengua Extranjera",
              "Facultad(es)": "CUCSH"
            },
            {
              "Carrera": "Licenciatura en Docencia del Inglés como Lengua Extranjera",
              "Facultad(es)": "CUCSH"
            },
            {
              "Carrera": "Licenciatura en Educación",
              "Facultad(es)": "CUNORTE, CUVALLES"
            },
            {
              "Carrera": "Licenciatura en Relaciones Internacionales",
              "Facultad(es)": "CUCEA, CUCSH"
            },
            {
              "Carrera": "Licenciatura en Estudios Políticos y Gobierno",
              "Facultad(es)": "CUCSH"
            },
            {
              "Carrera": "Licenciatura en Filosofía",
              "Facultad(es)": "CUCSH"
            },
            {
              "Carrera": "Licenciatura en Geografía",
              "Facultad(es)": "CUCSH"
            },
            {
              "Carrera": "Licenciatura en Gestión Cultural",
              "Facultad(es)": "SUV"
            },
            {
              "Carrera": "Licenciatura en Historia",
              "Facultad(es)": "CUCSH"
            },
            {
              "Carrera": "Licenciatura en Humanidades",
              "Facultad(es)": "CULAGOS"
            },
            {
              "Carrera": "Licenciatura en Letras Hispánicas",
              "Facultad(es)": "CUSUR, CUCSH"
            },
            {
              "Carrera": "Licenciatura en Periodismo",
              "Facultad(es)": "CULAGOS, CUSUR"
            },
            {
              "Carrera": "Licenciatura en Sociología",
              "Facultad(es)": "CUCSH"
            },
            {
              "Carrera": "Licenciatura en Trabajo Social",
              "Facultad(es)": "CUCSH, CUSUR, CUVALLES"
            },
            {
              "Carrera": "Licenciatura en Seguridad Ciudadana",
              "Facultad(es)": "SUV"
            },
            {
              "Carrera": "Licenciatura en Estudios Liberales",
              "Facultad(es)": "CUTONALA"
            }
          ]
        ',true);

        foreach($carreras as $carrera){
            Carrera::create([
                'nombre'=> $carrera['Carrera'], 
            ]);
        }
    }
}
