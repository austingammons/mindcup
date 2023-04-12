<?php

class MapService extends BaseService {

    public $thought_service;
    public $concept_service;
    public $paradigm_service;

    function __construct () {
        $this->thought_service = new ThoughtService();
        $this->concept_service = new ConceptService();
        $this->paradigm_service = new ParadigmService();
    }

    function get_all_data_by_user_guid ($user_guid) {

        $result = [];

        $paradigms = $this->paradigm_service->get_all_paradigms_by_user_guid($user_guid);

        foreach ($paradigms as $paradigm_key => $paradigm) {

            $concepts = $this->concept_service->get_all_concepts_by_paradigm_id($paradigm['id'], $user_guid);
            $paradigm['concepts'] = $concepts;
            
            
            foreach ($concepts as $concept_key => $concept) {
                
                $thoughts = $this->thought_service->get_all_thoughts_by_concept_id($concept['id'], $user_guid);
                $paradigm['concepts'][$concept_key]['thoughts'] = $thoughts;

            }

            array_push($result, $paradigm);

        }

        return $result;

    }

    public function prepare_mind_wired_data ($user_guid) {

        $y = -120;
        $x = 300;

        $result = [];

        $paradigms = $this->paradigm_service->get_all_paradigms_by_user_guid($user_guid);

        foreach ($paradigms as $paradigm_key => $paradigm) {

            $y += 40;

            // get concepts
            $concepts = $this->concept_service->get_all_concepts_by_paradigm_id($paradigm['id'], $user_guid);

            $paradigm['model'] = ['text' => $paradigm['title']];
            $paradigm['view'] = ['x' => $x + 100, 'y' => $y + 40];
            unset($paradigm[1]);
            unset($paradigm[2]);
            unset($paradigm[3]);
            unset($paradigm[4]);
            unset($paradigm['title']);
            unset($paradigm['date']);
            unset($paradigm['text']);
            unset($paradigm['user_guid']);

            // set paradigm subs
            $paradigm['subs'] = [];
            
            $y = -120;

            foreach ($concepts as $concept_key => $concept) {

                $y += 40;

                $concept['model'] = ['text' => $concept['title']];
                $concept['view'] = ['x' => $x + 200, 'y' => $y + 40];
                unset($concept[1]);
                unset($concept[2]);
                unset($concept[3]);
                unset($concept[4]);
                unset($concept[5]);
                unset($concept['title']);
                unset($concept['date']);
                unset($concept['text']);
                unset($concept['user_guid']);

                array_push($paradigm['subs'], $concept);
                
                $thoughts = $this->thought_service->get_all_thoughts_by_concept_id($concept['id'], $user_guid);

                $paradigm['subs'][$concept_key]['subs'] = [];

                $y = -120;

                foreach ($thoughts as $thought_key => $thought) {

                    $y += 40;
                    
                    $thought['model'] = ['text' => $thought['title']];
                    $thought['view'] = ['x' => $x + 300, 'y' => $y + 40];
                    unset($thought[1]);
                    unset($thought[2]);
                    unset($thought[3]);
                    unset($thought[4]);
                    unset($thought[5]);
                    unset($thought['title']);
                    unset($thought['date']);
                    unset($thought['text']);
                    unset($thought['user_guid']);

                    array_push($paradigm['subs'][$concept_key]['subs'], $thought);

                }

                //$paradigm['subs'][$concept_key]['subs'] = $thoughts;

            }

            //array_map([$this, 'to_mind_wired_formatted_array'], $paradigm);

        // echo '<pre>';
        // print_r(json_encode($paradigm, JSON_PRETTY_PRINT));
        // echo '</pre>';

            array_push($result, $paradigm);

        }

        return json_encode($result);

    }

    function get_paradigm_data_by_user_guid ($user_guid) {

        $data = $this->paradigm_service->get_all_paradigms_by_user_guid($user_guid);

        $formatted_data = $this->to_mind_wired_formatted_array($data);

        return $formatted_data;

    }

    public function to_mind_wired_formatted_array ($data) {

        $result = '{
            model: { text: "' . $data["title"] . '" },
            view: { x: 160, y: 0 },
            subs: []
        }';

        return $result;

    }

}