Feature: Guest can create a menu card
  In order to be able to make a request for dinner
  As a guest
  I need to be able to create a menu card

  Scenario: Successfully creating a menu card with a name
    Given I am a guest
    And I have restaurant with following data:
      | Restaurant name | Street name | Street number | City  | Country |
      | Odessa          | Igielna     | 19            | Jasło | Polska  |
    When I create the "Pizza" menu card
    Then the "Pizza" menu card should be saved
