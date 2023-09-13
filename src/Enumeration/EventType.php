<?php

namespace CBW\QMessage\Enumeration;

/**
 * Enum EventType
 * @package CBW\QMessage\Enumeration
 */
enum EventType: string
{
    case ARCHIVE_CONTACT = 'archive_contact';
    case BIRTHDAY_REMINDER = 'birthday_reminder';
    case CREATE_BOARDING = 'create_boarding';
    case CREATE_CONTACT = 'create_contact';
    case CREATE_INTERVIEW = 'create_interview';
    case DAYCARE_CONFIRMATION = 'daycare_confirmation';
    case EXPIRING_VACCINE = 'expiring_vaccine';
    case NEW_LEAD = 'new_lead';
    case PASSED_INTERVIEW = 'passed_interview';
    case RESERVATION_DECLINED = 'reservation_declined';
    case RESERVATION_REMINDER = 'reservation_reminder';
    case THANK_YOU = 'thank_you';
    case UPDATE_CONTACT = 'update_contact';
    case UPDATE_RESERVATION = 'update_reservation';
}