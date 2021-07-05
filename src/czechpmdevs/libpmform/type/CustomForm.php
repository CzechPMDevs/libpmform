<?php

/**
 * Copyright (C) 2021  CzechPMDevs
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

declare(strict_types=1);

namespace czechpmdevs\libpmform\type;

use czechpmdevs\libpmform\Form;

class CustomForm extends Form {

    public function __construct(string $title, bool $ignoreInvalidResponse = false) {
        parent::__construct(self::FORM_TYPE_CUSTOM, $ignoreInvalidResponse);

        $this->data["title"] = $title;
        $this->data["content"] = [];
    }

    /**
     * Adds text input to the custom form
     */
    public function addInput(string $text): void {
        $this->data["content"][] = ["type" => "input", "text" => $text];
    }

    /**
     * Adds label (text) to the custom form
     */
    public function addLabel(string $text): void {
        $this->data["content"][] = ["type" => "label", "text" => $text];
    }

    /**
     * Adds toggle (switch) to the custom form
     */
    public function addToggle(string $text, ?bool $default = null): void {
        if($default !== null) {
            $this->data["content"][] = ["type" => "toggle", "text" => $text, "default" => $default];
            return;
        }
        $this->data["content"][] = ["type" => "toggle", "text" => $text];
    }

    /**
     * Adds dropdown (menu with options) to the form
     *
     * @phpstan-var string[] $options
     */
    public function addDropdown(string $text, array $options, ?int $default = null): void {
        if($default !== null) {
            $this->data["content"][] = ["type" => "dropdown", "text" => $text, "options" => $options, "default" => $default];
            return;
        }
        $this->data["content"][] = ["type" => "dropdown", "text" => $text, "options" => $options];
    }
}